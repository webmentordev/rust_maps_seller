<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>2023-09-04T09:34:11+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.00</priority>
    </url>
    <url>
        <loc>{{ url('/') }}/contact</loc>
        <lastmod>2023-09-04T09:34:11+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.90</priority>
    </url>
    <url>
        <loc>{{ url('/') }}/report</loc>
        <lastmod>2023-09-04T09:34:11+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.90</priority>
    </url>
    <url>
        <loc>{{ url('/') }}/maps</loc>
        <lastmod>2023-09-04T09:34:11+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.90</priority>
    </url>
    <url>
        <loc>{{ url('/') }}/login</loc>
        <lastmod>2023-09-04T09:34:11+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.90</priority>
    </url>
    <url>
        <loc>{{ url('/') }}/register</loc>
        <lastmod>2023-09-04T09:34:11+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.90</priority>
    </url>
    <url>
        <loc>{{ url('/') }}/blogs</loc>
        <lastmod>2023-09-04T09:34:11+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.90</priority>
    </url>
    @foreach ($maps as $map)
        <url>
            <loc>{{ url('/') }}/map/{{ $map->slug }}</loc>
            <lastmod>{{ $map->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.80</priority>
        </url>
    @endforeach
    @foreach ($blogs as $blog)
        <url>
            <loc>{{ url('/') }}/blog/{{ $blog->slug }}</loc>
            <lastmod>{{ $blog->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.80</priority>
        </url>
    @endforeach
</urlset>