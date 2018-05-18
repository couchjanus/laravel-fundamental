RenameTestsTable: rename table `tests` to `categories`

CreatePostsTable: create table `posts` (`id` int unsigned not null auto_increment primary key, `title` varchar(255) not null, `content` text not null, `is_active` tinyint(1) not null, `category_id` int unsigned not null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci'

UpdateCategoriesTable: alter table `categories` add `description` varchar(255) null
