import { InertiaLinkProps } from '@inertiajs/vue3';
import type { LucideIcon } from 'lucide-vue-next';

export interface Auth {
    user: User;
}

export interface BreadcrumbItem {
    title: string;
    href: string;
}

export interface NavItem {
    title: string;
    href: NonNullable<InertiaLinkProps['href']>;
    icon?: LucideIcon;
    isActive?: boolean;
}

export type AppPageProps<
    T extends Record<string, unknown> = Record<string, unknown>,
> = T & {
    name: string;
    quote: { message: string; author: string };
    auth: Auth;
    sidebarOpen: boolean;
};

export interface User {
    id: number;
    name: string;
    email: string;
    avatar?: string;
    email_verified_at: string | null;
    created_at: string;
    updated_at: string;
}

export interface Budget {
    id: number;
    name: string;
    slug: string;
    created_at: string;
    updated_at: string;
    categories: Category[];
}

export interface Category {
    id: number;
    name: string;
    category_parent_id: number | null;
    created_at: string;
    updated_at: string;
    subcategories?: Category[];
    targets?: Target[];
}

export interface Target {
    id: number;
    name: string;
    category_id: number;
    goal_amount: number;
    assigned_amount: number;
    created_at: string;
    updated_at: string;
}

export type BreadcrumbItemType = BreadcrumbItem;
