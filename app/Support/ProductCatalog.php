<?php

namespace App\Support;

class ProductCatalog
{
    /**
     * @return list<array<string, mixed>>
     */
    public static function all(): array
    {
        return [
            self::item(1, 'Embroidered Lawn Kurta', 3499, 4299, 5, 128, true, false, 19, 18, 'kurtas-kurtis', 'Kurtas & Kurtis', 'Soft lawn kurta with delicate embroidery, made for everyday elegance. Lightweight fabric with a relaxed fit that stays comfortable in warm weather.', [
                'https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?w=900&h=1100&fit=crop',
                'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=900&h=1100&fit=crop',
                'https://images.unsplash.com/photo-1490481651871-ab68de25d43d?w=900&h=1100&fit=crop',
            ]),
            self::item(2, 'Floral Printed Lawn Suit', 5199, 6499, 4, 96, false, true, 20, 12, 'lawn-suits', 'Lawn Suits', 'Three-piece lawn suit with a floral print and matching dupatta. Premium stitching and a flattering silhouette for both casual and festive wear.', [
                'https://images.unsplash.com/photo-1483985988355-763728e1935b?w=900&h=1100&fit=crop',
                'https://images.unsplash.com/photo-1469334031218-e382a71b716b?w=900&h=1100&fit=crop',
                'https://images.unsplash.com/photo-1485968579580-b6d95e42dfcc?w=900&h=1100&fit=crop',
            ]),
            self::item(3, 'Silk Formal Shirt', 7999, 7999, 5, 64, true, true, 0, 8, 'formal-wear', 'Formal Wear', 'Rich silk formal shirt with a clean neckline and tailored drape. Designed for evening events and formal gatherings.', [
                'https://images.unsplash.com/photo-1539008835657-9e8e9680c956?w=900&h=1100&fit=crop',
                'https://images.unsplash.com/photo-1525507119028-ed4c629a60a3?w=900&h=1100&fit=crop',
                'https://images.unsplash.com/photo-1558171813-4c088753af8f?w=900&h=1100&fit=crop',
            ]),
            self::item(4, 'Pastel Chiffon Dupatta Set', 2899, 3599, 4, 51, false, false, 19, 22, 'accessories', 'Accessories', 'Airy chiffon dupatta set in a soft pastel palette. Easy to style with kurtas and lawn suits for a complete look.', [
                'https://images.unsplash.com/photo-1509631179647-0177331693ae?w=900&h=1100&fit=crop',
                'https://images.unsplash.com/photo-1487222477894-8943e31ef7b2?w=900&h=1100&fit=crop',
                'https://images.unsplash.com/photo-1475180098084-4b07ddd3d455?w=900&h=1100&fit=crop',
            ]),
            self::item(5, 'Classic White Cotton Kurti', 2499, 2499, 4, 210, false, true, 0, 30, 'kurtas-kurtis', 'Kurtas & Kurtis', 'Everyday cotton kurti with a breathable weave and minimal embroidery. A wardrobe essential that pairs with jeans or trousers.', [
                'https://images.unsplash.com/photo-1434389677669-e08bb4dd6c5f?w=900&h=1100&fit=crop',
                'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=900&h=1100&fit=crop',
                'https://images.unsplash.com/photo-1485462537746-965f33f7f6a7?w=900&h=1100&fit=crop',
            ]),
            self::item(6, 'Festive Gold Embroidered Suit', 11999, 14999, 5, 42, true, false, 20, 6, 'formal-wear', 'Formal Wear', 'Statement festive suit with gold embroidery and a rich finish. Made for weddings, mehndi, and celebration evenings.', [
                'https://images.unsplash.com/photo-1566174053879-31528523f8ae?w=900&h=1100&fit=crop',
                'https://images.unsplash.com/photo-1515372039744-b8f02a3ae446?w=900&h=1100&fit=crop',
                'https://images.unsplash.com/photo-1496747611176-843222e1e57c?w=900&h=1100&fit=crop',
            ]),
            self::item(7, 'Printed Summer Lawn 2pc', 3999, 4599, 4, 77, true, false, 13, 14, 'lawn-suits', 'Lawn Suits', 'Light two-piece lawn set with a seasonal print. Easy care fabric and a modern cut for summer days.', [
                'https://images.unsplash.com/photo-1581044777550-4cfa60707c03?w=900&h=1100&fit=crop',
                'https://images.unsplash.com/photo-1529139574466-a262c2b50b3a?w=900&h=1100&fit=crop',
                'https://images.unsplash.com/photo-1503342217505-b0a15ec3261c?w=900&h=1100&fit=crop',
            ]),
            self::item(8, 'Midnight Velvet Shawl', 6499, 7999, 5, 33, false, true, 19, 9, 'accessories', 'Accessories', 'Soft velvet shawl in a midnight tone, finished with subtle border work. Adds warmth and polish to winter outfits.', [
                'https://images.unsplash.com/photo-1544441893-675973e31985?w=900&h=1100&fit=crop',
                'https://images.unsplash.com/photo-1445205170230-053b83016050?w=900&h=1100&fit=crop',
                'https://images.unsplash.com/photo-1552374196-1ab2a1c593e8?w=900&h=1100&fit=crop',
            ]),
        ];
    }

    /**
     * @return list<array{slug: string, name: string, image: string}>
     */
    public static function categories(): array
    {
        return [
            ['slug' => 'kurtas-kurtis', 'name' => 'Kurtas & Kurtis', 'image' => 'https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?w=400&h=400&fit=crop'],
            ['slug' => 'lawn-suits', 'name' => 'Lawn Suits', 'image' => 'https://images.unsplash.com/photo-1483985988355-763728e1935b?w=400&h=400&fit=crop'],
            ['slug' => 'formal-wear', 'name' => 'Formal Wear', 'image' => 'https://images.unsplash.com/photo-1539008835657-9e8e9680c956?w=400&h=400&fit=crop'],
            ['slug' => 'accessories', 'name' => 'Accessories', 'image' => 'https://images.unsplash.com/photo-1544441893-675973e31985?w=400&h=400&fit=crop'],
        ];
    }

    /**
     * @return array<string, mixed>|null
     */
    public static function find(int $id): ?array
    {
        foreach (self::all() as $product) {
            if ($product['id'] === $id) {
                return $product;
            }
        }

        return null;
    }

    /**
     * @return list<array<string, mixed>>
     */
    public static function related(int $id, int $limit = 3): array
    {
        $others = array_values(array_filter(
            self::all(),
            fn (array $product): bool => $product['id'] !== $id,
        ));

        return array_slice($others, 0, $limit);
    }

    /**
     * @return list<array<string, mixed>>
     */
    public static function search(string $query): array
    {
        $needle = mb_strtolower(trim($query));

        if ($needle === '') {
            return self::all();
        }

        return array_values(array_filter(
            self::all(),
            function (array $product) use ($needle): bool {
                return str_contains(mb_strtolower($product['name']), $needle)
                    || str_contains(mb_strtolower($product['category']), $needle)
                    || str_contains(mb_strtolower($product['description']), $needle);
            },
        ));
    }

    /**
     * @return list<array<string, mixed>>
     */
    public static function byCategory(string $slug): array
    {
        if ($slug === 'new-arrivals') {
            return array_values(array_filter(
                self::all(),
                fn (array $product): bool => $product['is_new'] === true,
            ));
        }

        return array_values(array_filter(
            self::all(),
            fn (array $product): bool => $product['category_slug'] === $slug,
        ));
    }

    public static function categoryName(string $slug): string
    {
        if ($slug === 'new-arrivals') {
            return 'New Arrivals';
        }

        foreach (self::categories() as $category) {
            if ($category['slug'] === $slug) {
                return $category['name'];
            }
        }

        return 'Category';
    }

    /**
     * @param  list<string>  $images
     * @return array<string, mixed>
     */
    private static function item(
        int $id,
        string $name,
        int $price,
        int $originalPrice,
        int $rating,
        int $reviews,
        bool $isNew,
        bool $isBestseller,
        int $discount,
        int $stockCount,
        string $categorySlug,
        string $category,
        string $description,
        array $images,
    ): array {
        return [
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'original_price' => $originalPrice,
            'rating' => $rating,
            'reviews' => $reviews,
            'is_new' => $isNew,
            'is_bestseller' => $isBestseller,
            'discount' => $discount,
            'in_stock' => true,
            'stock_count' => $stockCount,
            'category_slug' => $categorySlug,
            'category' => $category,
            'description' => $description,
            'images' => $images,
        ];
    }
}
