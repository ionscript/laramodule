const publicVapidKey =
    "BIfOt9NVabQNFTYm2Noc7Qlk8_NBRv5FVSuU9JG-lMudf-D7JrwWk69pA2sSs6LOHnaYptCsYOAncpxP1JxUl24";
let subscription;
$(document).ready(() => {
    // Check for service worker

    if ("serviceWorker" in navigator) {
        send().catch(err => console.error(err));
        navigator.serviceWorker.addEventListener('message', event => {
            switch (event.data.action) {
                case 'replyMessage':
                    $('#agentsBlock [data-user-id="'+event.data.data.agentFrom+'"]').click();
                break;
                case 'replyGroupMessage':
                    $('.groupChatSelect[data-group-hash="'+event.data.data.groupHash+'"]').click();
                break;
                case 'acceptCall':
                    $('#accept_call').click();
                break;
                case 'message':
                    $('#voicemailCallTrigger').click();
                break;
            }
        });
    }
});
// Register SW, Register Push, Send Push
async function send() {
    // Register Service Worker
    console.log("Registering service worker...");
    const register = await navigator.serviceWorker.register("sw.js");
    console.log("Service Worker Registered...");

    // Register Push
    console.log("Registering Push...");
    try{
        subscription = await register.pushManager.subscribe({
            userVisibleOnly: true,
            applicationServerKey: urlBase64ToUint8Array(publicVapidKey)
        });

        console.log("Push Registered...");

        // Send Push Notification
        console.log("Register Push...");

        const subscribeData = {
          agentHash: agentHash,
          subscription: subscription
        };

        await fetch("http://localhost:3000/subscribe", {
            method: "POST",
            body: JSON.stringify(subscribeData),
            headers: {
                "content-type": "application/json"
            }
        });
        console.log("Push Registered...");
    } catch (e) {
        console.error(e);
    }
}

function urlBase64ToUint8Array(base64String) {
    const padding = "=".repeat((4 - base64String.length % 4) % 4);
    const base64 = (base64String + padding)
        .replace(/\-/g, "+")
        .replace(/_/g, "/");

    const rawData = window.atob(base64);
    const outputArray = new Uint8Array(rawData.length);

    for (let i = 0; i < rawData.length; ++i) {
        outputArray[i] = rawData.charCodeAt(i);
    }
    return outputArray;
}
