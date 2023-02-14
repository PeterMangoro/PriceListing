<template>
  <app-layout>
    <section class="py-8 grid place-content-center min-h-screen">
      <div class="container px-4 mx-auto">
        <div class="flex flex-wrap justify-evenly">
          <dashboard-card
            title="Employees"
            :total="counts.employee_count"
            add_path="employees.index"
            more_path="employees.index"
            add_tip="Click to Add a new Employee"
            more_tip="Click to view all your available employees"
          />

          <dashboard-card
            title="Contact Details"
            :total="counts.contact_count"
            add_path="socials.index"
            more_path="socials.index"
            add_tip="Click to Add a new Employee"
            more_tip="Click to view all your available contact details"
          />

          <dashboard-card
            title="Accommodation Sales"
            :total="counts.accommodation_count"
            add_path="accommodations.create"
            more_path="accommodations.index"
            add_tip="Click to Add a new Accommodation"
            more_tip="Click to view all your uploaded accommodations"
          />

          <!-- <dashboard-card 
         title="Accommodation Services"
         :total=counts.accommodation_count
         add_path = 'accommodations.create'
         more_path = 'accommodations.index'
          add_tip = 'Click to Add a new Accommodation'
         more_tip = 'Click to view all your uploaded accommodations'
         /> -->

          <dashboard-card 
         title="Cars"
         :total=counts.car_count
         add_path = 'cars.create'
         more_path = 'cars.index'
         add_tip = 'Click to Add a new Car to advertise'
         more_tip = 'Click to view all your uploaded cars'
         />

          <dashboard-card
            title="Plots & Farms"
            :total="counts.plot_count"
            add_path="plots.create"
            more_path="plots.index"
            add_tip="Click to Add a new plot or farm or land"
            more_tip="Click to view all your uploaded lands"
          />

          <dashboard-card
            title="Products"
            :total="counts.product_count"
            add_path="products.create"
            more_path="products.index"
            add_tip="Click to Add a new product to advertise"
            more_tip="Click to view all your uploaded products"
          />

          <!-- <dashboard-card 
         title="Travel & Trips"
         :total=counts.transport_count
         add_path = 'transports.create'
         more_path = 'transports.index'
         add_tip = 'Click to Add a new trip'
         more_tip = 'Click to view all your uploaded trips'
         /> -->

          <dashboard-card
            title="Services"
            :total="counts.service_count"
            add_path="services.create"
            more_path="services.index"
            add_tip="Click to Add a new Service"
            more_tip="Click to view all your uploaded services"
          />
        </div>
      </div>
    </section>
  </app-layout>
</template>
  
  <script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import DashboardCard from "@/Components/Shared/DashboardCard.vue";

const props = defineProps({
  counts: Number,
});
</script>
  
  <style>
</style>