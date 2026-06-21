<?php

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

return [
    /*
     * The model used for roles.
     * Change this if you use a custom Role model.
     */
    'role_model' => Role::class,

    /*
     * The model used for permissions.
     * Change this if you use a custom Permission model.
     */
    'permission_model' => Permission::class,

    /*
     * The role name that bypasses all permission checks.
     */
    'super_admin_role' => 'Super Admin',

    /*
     * The frontend framework to generate stubs for.
     * Supported: "react", "vue"
     */
    'framework' => 'react',

    /*
     * Output path for the generated TypeScript types file.
     */
    'output_path' => resource_path('js/types/roles-permissions.ts'),

    /*
     * Output path for the generated utils stub.
     * Supported placeholders: {framework}
     */
    'stubs' => [
        'react' => [
            'utils' => resource_path('js/utils/role-permission.ts'),
            'hook' => resource_path('js/hooks/use-role-permission.ts'),
        ],
        'vue' => [
            'utils' => resource_path('js/utils/role-permission.ts'),
            'composable' => resource_path('js/composables/use-role-permission.ts'),
        ],
    ],
];
