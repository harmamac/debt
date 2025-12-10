// const CACHE_NAME = 'money-manager-v1';
// const urlsToCache = [
//   '/',
//   '/css/style.css',
//   '/enter-code'
// ];

// // Install service worker
// self.addEventListener('install', event => {
//   event.waitUntil(
//     caches.open(CACHE_NAME)
//       .then(cache => {
//         console.log('Opened cache');
//         return cache.addAll(urlsToCache);
//       })
//   );
// });

// // Fetch from cache
// self.addEventListener('fetch', event => {
//   event.respondWith(
//     caches.match(event.request)
//       .then(response => {
//         // Cache hit - return response
//         if (response) {
//           return response;
//         }
//         return fetch(event.request);
//       }
//     )
//   );
// });

// // Update service worker
// self.addEventListener('activate', event => {
//   const cacheWhitelist = [CACHE_NAME];
//   event.waitUntil(
//     caches.keys().then(cacheNames => {
//       return Promise.all(
//         cacheNames.map(cacheName => {
//           if (cacheWhitelist.indexOf(cacheName) === -1) {
//             return caches.delete(cacheName);
//           }
//         })
//       );
//     })
//   );
// });



const CACHE_NAME = 'money-manager-v2'; // Changed version number
const urlsToCache = [
  '/css/style.css',
  '/icons/icon-192x192.png',
  '/icons/icon-512x512.png'
];

// Install service worker
self.addEventListener('install', event => {
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(cache => {
        console.log('Opened cache');
        return cache.addAll(urlsToCache);
      })
  );
});

// Fetch from cache - FIXED VERSION
self.addEventListener('fetch', event => {
  const url = new URL(event.request.url);
  
  // CRITICAL FIX: Only handle GET requests for static assets
  // Ignore all POST/PUT/DELETE and dynamic routes
  if (event.request.method !== 'GET' ||
      url.pathname === '/verify-code' ||
      url.pathname.startsWith('/debt') ||
      url.pathname.startsWith('/expense') ||
      url.pathname.startsWith('/safekeeping') ||
      url.pathname === '/logout' ||
      url.pathname === '/enter-code' ||
      url.pathname === '/') {
    // Let the browser handle it directly - DO NOT CACHE
    return;
  }
  
  // Only cache static assets (CSS, JS, images)
  event.respondWith(
    caches.match(event.request)
      .then(response => {
        // Cache hit - return cached response
        if (response) {
          return response;
        }
        // Not in cache - fetch from network
        return fetch(event.request);
      })
  );
});

// Update service worker
self.addEventListener('activate', event => {
  const cacheWhitelist = [CACHE_NAME];
  event.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(
        cacheNames.map(cacheName => {
          if (cacheWhitelist.indexOf(cacheName) === -1) {
            return caches.delete(cacheName);
          }
        })
      );
    })
  );
});
