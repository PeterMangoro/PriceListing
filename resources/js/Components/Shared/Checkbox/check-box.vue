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
      <Square v-if="!props.checked" />
      <CheckedSquare v-if="props.checked" />
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
