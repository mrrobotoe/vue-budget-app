<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { budget as budgetRoute } from '@/routes';
import { type BreadcrumbItem, Budget } from '@/types';
import { Head } from '@inertiajs/vue3';

import { ref } from 'vue';
import Category from '@/components/Category.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Budget',
        href: budgetRoute().url,
    },
];

interface Props {
    budget: Budget;
}

defineProps<Props>();
</script>

<template>
    <Head title="Budget" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-0 overflow-x-auto px-4">
            <div
                class="group -mx-4"
                v-for="category in budget.categories"
                :key="category.id"
            >
                <Category :category="category" />
            </div>
        </div>
    </AppLayout>
</template>
