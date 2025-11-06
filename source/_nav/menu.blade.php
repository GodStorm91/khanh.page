<nav class="hidden lg:flex items-center justify-end text-lg">
    <a title="{{ $page->siteName }} Blog" href="{{ $page->baseUrl }}/blog"
        class="ml-6 text-grey-darker hover:text-blue-dark {{ $page->isActive('/blog') ? 'active text-blue-dark' : '' }}">
        Blog
    </a>

    <a title="{{ $page->siteName }} About" href="{{ $page->baseUrl }}/about"
        class="ml-6 text-grey-darker hover:text-blue-dark {{ $page->isActive('/about') ? 'active text-blue-dark' : '' }}">
        About
    </a>

    <a title="{{ $page->siteName }} Contact" href="{{ $page->baseUrl }}/contact"
        class="ml-6 text-grey-darker hover:text-blue-dark {{ $page->isActive('/contact') ? 'active text-blue-dark' : '' }}">
        Contact
    </a>
</nav>
