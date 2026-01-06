<script setup lang="ts">
import {
    Collapsible,
    CollapsibleContent,
    CollapsibleTrigger,
} from '@/components/ui/collapsible';
import { ChevronDown, ChevronRight } from 'lucide-vue-next';
import { ref } from 'vue';
import { Category } from '@/types';
import Subcategory from '@/components/Subcategory.vue';

const isOpen = ref(false);

interface Props {
    category: Category;
}

defineProps<Props>();

</script>

<template>
    <Collapsible v-model:isOpen="isOpen" class="group/collapsible">
        <CollapsibleTrigger
            class="w-full border-border bg-muted px-4 py-2 text-start text-foreground group-not-first:border-t"
        >
            <div class="flex items-center gap-2">
                <ChevronDown
                    class="hidden size-4 text-foreground/60 group-data-[state=open]/collapsible:block"
                />
                <ChevronRight
                    class="hidden size-4 text-foreground/60 group-data-[state=closed]/collapsible:block"
                />
                <h3 class="font-semibold">{{ category.name }}</h3>
            </div>
        </CollapsibleTrigger>
        <CollapsibleContent>
            <div
                v-for="subcategory in category.subcategories"
                :key="subcategory.id"
                class="grid grid-cols-5 border-border px-4 py-3 not-last:border-b"
            >
                <Subcategory :subcategory="subcategory" />
            </div>
        </CollapsibleContent>
    </Collapsible>
</template>
