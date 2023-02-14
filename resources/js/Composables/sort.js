import { reactive, watch } from "vue";
import { pickBy,throttle } from "lodash";
import { usePage } from '@inertiajs/vue3'
import { router } from "@inertiajs/vue3";

export function useSort(column,routeName) {

   const sort_table = reactive({
        column: usePage().props.value.data.filters.column,
        direction: usePage().props.value.data.filters.direction,
      })

    function sort(column) {
        sort_table.column = column;
        sort_table.direction = sort_table.direction === 'asc' ? 'desc' : 'asc' ;    
      }   
      
      watch(
        sort_table,
        throttle(() => {
          let query = pickBy(sort_table);
          let queryRoute = route(
            routeName,
            Object.keys(query).length
              ? query
              : {
                  remember: "forget",
                }
          );
          router.get(
            queryRoute,
            {},
            {
              preserveState: true,
              replace: true,
              preserveScroll:true
            }
          );
        }, 400),
        {
          deep: true,
        }
      );     

    return sort(column)
}