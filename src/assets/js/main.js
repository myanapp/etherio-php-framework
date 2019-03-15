'use strict';

// Ss_sPEKjZhh0-aBRN0rOxtJ8bWcwENMPT54znfyYyew
const applicationServerPublicKey = 'BCG4zKEbd2PGkFqZR4c4a7gvDyINX5jODjalnYaTBdT5meYZ0GIzmQnUVoZrYkAKYk4oHySGf2pRA1mZHAM0RxY';

const pushButton = document.querySelector('.js-push-btn');

let isSubscribed = false;
let swRegistration = null;

function urlB64ToUint8Array(base64String) {
  const padding = '='.repeat((4 - base64String.length % 4) % 4);
  const base64 = (base64String + padding)
    .replace(/\-/g, '+')
    .replace(/_/g, '/');

  const rawData = window.atob(base64);
  const outputArray = new Uint8Array(rawData.length);

  for (let i = 0; i < rawData.length; ++i) {
    outputArray[i] = rawData.charCodeAt(i);
  }
  return outputArray;
}