var staticCacheName = "pwa-v" + new Date().getTime();
var filesToCache = [
    "/assets/css/style.css",
    "/assets/js/app.js",
    "/assets/js/color-scheme.js",
    "/assets/js/jquery-3.3.1.min.js",
    "/assets/js/main.js",
    "/assets/vendor/bootstrap-5/js/bootstrap.bundle.min.js",
    "/assets/js/popper.min.js",
    "/assets/vendor/chart-js-3.3.1/chart.min.js",
    "/assets/vendor/progressbar-js/progressbar.min.js",
    "/assets/vendor/swiperjs-6.6.2/swiper-bundle.min.js",
];

// Cache on install
self.addEventListener("install", event => {
    this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
            .then(cache => {
                return cache.addAll(filesToCache);
            })
    )
});

// Clear cache on activate
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("pwa-")))
                    .filter(cacheName => (cacheName !== staticCacheName))
                    .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});

// Serve from Cache
self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                return response || fetch(event.request);
            })
            .catch(() => {
                return caches.match('offline');
            })
    )
});
