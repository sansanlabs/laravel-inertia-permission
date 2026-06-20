import { usePage } from '@inertiajs/react';
import { useMemo } from 'react';

import { can, canAll, canAny, hasAnyRole, hasEveryRole, hasRole } from '@/utils/role-permission';
import type { Permission, Role } from '@/types/roles-permissions';

export function useRolePermission() {
    const { roles, permissions } = usePage().props as {
        roles: string[];
        permissions: string[];
    };

    const roleSet       = useMemo(() => new Set<string>(roles), [roles]);
    const permissionSet = useMemo(() => new Set<string>(permissions), [permissions]);

    return {
        can:          (permission: Permission)  => can(roleSet, permissionSet, permission),
        canAny:       (permissions: Permission[]) => canAny(roleSet, permissionSet, permissions),
        canAll:       (permissions: Permission[]) => canAll(roleSet, permissionSet, permissions),
        hasRole:      (role: Role)              => hasRole(roleSet, role),
        hasAnyRole:   (roles: Role[])           => hasAnyRole(roleSet, roles),
        hasEveryRole: (roles: Role[])           => hasEveryRole(roleSet, roles),
    };
}