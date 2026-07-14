import { delay } from "./uiDelay.js";
/**
 * Generates a random integer between min and max (inclusive)
 * @param min - Minimum value
 * @param max - Maximum value
 * @returns Random integer between min and max
 */
function randomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}
/**
 * Starts the housing example image exchange animation
 * Periodically swaps example images with random ones from the assets directory
 */
export async function startHousingExampleExchanger() {
    const dir = "/assets/";
    const totalExamples = 6;
    const examples = document.querySelectorAll(".eg-img");
    if (examples.length === 0) {
        console.warn("No example images found for exchange animation");
        return;
    }
    const maxRegisteredImages = Math.min(totalExamples, examples.length);
    const maxRegisteredExchanges = examples.length;
    // Track currently used images and exchange positions to avoid duplicates
    // Using arrays to implement FIFO (First-In-First-Out) behavior
    let registeredImages = [1, 2, 3];
    let registeredExchanges = [0, 1, 2];
    const prefix = "example-";
    const ext = ".jpg";
    setInterval(async () => {
        // Remove oldest entry when arrays are full (FIFO)
        if (registeredImages.length >= maxRegisteredImages) {
            registeredImages.shift(); // Remove first (oldest) element
        }
        if (registeredExchanges.length >= maxRegisteredExchanges) {
            registeredExchanges.shift(); // Remove first (oldest) element
        }
        // Find an unused image number
        let nImage;
        let attempts = 0;
        const maxAttempts = 10;
        do {
            nImage = randomInt(1, totalExamples);
            attempts++;
            if (attempts >= maxAttempts) {
                // If we can't find an unused image, reset and try again
                registeredImages = [];
                attempts = 0;
            }
        } while (registeredImages.includes(nImage) && attempts < maxAttempts);
        // Find an unused exchange position
        let nExchange;
        attempts = 0;
        do {
            nExchange = randomInt(0, examples.length - 1);
            attempts++;
            if (attempts >= maxAttempts) {
                registeredExchanges = [];
                attempts = 0;
            }
        } while (registeredExchanges.includes(nExchange) && attempts < maxAttempts);
        // Ensure values are valid
        nImage = nImage < 0 ? 1 : Math.floor(nImage);
        nExchange = Math.floor(nExchange);
        const exampleToExchange = examples[nExchange];
        if (!exampleToExchange) {
            return;
        }
        // Random delay for more natural appearance
        const delayTime = Math.random() * 238;
        await delay(delayTime);
        // Update image source
        const newSrc = `${dir}${prefix}${nImage}${ext}`;
        exampleToExchange.src = newSrc;
        // Register this image and exchange position
        registeredImages.push(nImage);
        registeredExchanges.push(nExchange);
    }, 2600);
}
