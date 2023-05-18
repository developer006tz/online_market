<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'attach' => 'Attach',
        'detach' => 'Detach',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'users' => [
        'name' => 'Users',
        'index_title' => 'Users List',
        'new_title' => 'New User',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'photo' => 'Photo',
            'password' => 'Password',
            'location' => 'Location',
            'status' => 'Status',
        ],
    ],

    'post_categories' => [
        'name' => 'Post Categories',
        'index_title' => 'PostCategories List',
        'new_title' => 'New Post category',
        'create_title' => 'Create PostCategory',
        'edit_title' => 'Edit PostCategory',
        'show_title' => 'Show PostCategory',
        'inputs' => [
            'title' => 'Title',
            'image' => 'Image',
        ],
    ],

    'messages' => [
        'name' => 'Messages',
        'index_title' => 'Messages List',
        'new_title' => 'New Message',
        'create_title' => 'Create Message',
        'edit_title' => 'Edit Message',
        'show_title' => 'Show Message',
        'inputs' => [
            'conversation_id' => 'Conversation',
            'user_id' => 'User',
            'body' => 'Body',
            'image' => 'Image',
            'file' => 'File',
        ],
    ],

    'conversations' => [
        'name' => 'Conversations',
        'index_title' => 'Conversations List',
        'new_title' => 'New Conversation',
        'create_title' => 'Create Conversation',
        'edit_title' => 'Edit Conversation',
        'show_title' => 'Show Conversation',
        'inputs' => [
            'post_id' => 'Post',
            'seller_id' => 'User',
            'customer_id' => 'Customer Id',
        ],
    ],

    'posts' => [
        'name' => 'Posts',
        'index_title' => 'Posts List',
        'new_title' => 'New Post',
        'create_title' => 'Create Post',
        'edit_title' => 'Edit Post',
        'show_title' => 'Show Post',
        'inputs' => [
            'user_id' => 'User',
            'title' => 'Title',
            'description' => 'Description',
            'image' => 'Image',
        ],
    ],

    'roles' => [
        'name' => 'Roles',
        'index_title' => 'Roles List',
        'create_title' => 'Create Role',
        'edit_title' => 'Edit Role',
        'show_title' => 'Show Role',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'permissions' => [
        'name' => 'Permissions',
        'index_title' => 'Permissions List',
        'create_title' => 'Create Permission',
        'edit_title' => 'Edit Permission',
        'show_title' => 'Show Permission',
        'inputs' => [
            'name' => 'Name',
        ],
    ],
];
