<script setup lang="ts">
import { defineProps, ref } from 'vue';
import { Category } from '@/types/index.d';
import { Input } from '@/components/ui/input';

const isOpen = ref(false);
const isEditing = ref(false);

interface Props {
    subcategory: Category;
}

defineProps<Props>();
</script>

<template>
    <span class="col-span-2">{{ subcategory.name }}</span>
    <div
        class="text-right text-sm"
        v-on:click="isEditing = !isEditing"
        @click.self="isEditing = false"
    >
        <template v-if="isEditing">
            <Input type="number" class="max-w-24 h-6 text-right" default-value="0.00"></Input>
        </template>
        <template v-else>
            <span class="text-right text-sm">$0.00</span>
        </template>
    </div>
    <span class="text-right text-sm">$0.00</span>
    <span class="text-right text-sm">$0.00</span>
</template>
