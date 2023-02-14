<script setup>
import { computed } from "vue";
import CheckedSquare from "@/Components/Shared/Icons/check-square.svg?component";
import Square from "@/Components/Shared/Icons/square.svg?component";

const emit = defineEmits({
  onChange: {
    type: "change",
    default: () => {},
  },
});

const props = defineProps({
  value: {
    type: String,
    default: "",
  },
  label: {
    type: String,
    default: "",
  },
  checked: {
    type: Boolean,
    default: false,
  },
  id: {
    type: String,
    default: "",
  },
  disabled: {
    type: Boolean,
    default: false,
  },
});

const wrapperClass = computed(() => {
  const { checked } = props;
  return {
    "check-box": true,
    "check-box--checked": checked,
  };
});

const iconClass = computed(() => {
  const { checked } = props;
  return {
    "check-box__icon": true,
    "check-box__icon--checked": checked,
  };
});

const handleClick = () => {
  emit("onChange", props.id);
};
</script>

<template>
  <div
    :class="wrapperClass"
    tabindex="0"
    role="checkbox"
    :aria-labelledby="`label-${props.id}`"
    :aria-checked="props.checked"
    @click="handleClick"
  >
    <span :class="iconClass">
      <!-- <Square v-if="!props.checked" /> -->
      <p v-if="!props.checked">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="feather feather-square"
        >
          <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
        </svg>
      </p>
      <p v-else>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="feather feather-check-square"
        >
          <polyline points="9 11 12 14 22 4" />
          <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11" />
        </svg>
      </p>
      <!-- <CheckedSquare v-if="props.checked" /> -->
    </span>
    <span :id="`label-${props.id}`" class="label">
      {{ props.label }}
    </span>
  </div>
</template>

<style scoped lang="css">
.check-box {
  align-items: center;
  border: 1px solid transparent;
  cursor: pointer;
  display: flex;
  justify-content: flex-start;
  padding: 0rem;
  user-select: none;
}

.label {
  padding-left: 0.5rem;
}

.check-box__icon {
  display: block;
  height: 1rem;
  width: 1rem;

  svg {
    height: 100%;
    width: 100%;
  }
}
</style>
