import { delay } from "./uiDelay.js";

/**
 * Generates a random integer between min and max (inclusive)
 * @param min - Minimum value
 * @param max - Maximum value
 * @returns Random integer between min and max
 */
function randomInt(min: number, max: number): number {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

/**
 * Starts the housing example image exchange animation
 * Periodically swaps example images with random ones from the assets directory
 */
export async function startHousingExampleExchanger(): Promise<void> {
  const dir = "/assets/";
  const totalExamples = 6;
  const examples = document.querySelectorAll<HTMLImageElement>(".eg-img");
  
  if (examples.length === 0) {
    console.warn("No example images found for exchange animation");
    return;
  }

  const maxRegisteredImages = Math.min(totalExamples, examples.length);
  const maxRegisteredExchanges = examples.length;
  
  // Track currently used images and exchange positions to avoid duplicates
  let registeredImages = new Set<number>([1, 2, 3]);
  let registeredExchanges = new Set<number>([0, 1, 2]);
  
  const prefix = "example-";
  const ext = ".jpg";

  setInterval(async () => {
    // Reset sets if they're full to prevent infinite loop
    if (registeredImages.size >= maxRegisteredImages) {
      registeredImages.clear();
    }
    if (registeredExchanges.size >= maxRegisteredExchanges) {
      registeredExchanges.clear();
    }

    // Find an unused image number
    let nImage: number;
    let attempts = 0;
    const maxAttempts = 10;
    
    do {
      nImage = randomInt(1, totalExamples);
      attempts++;
      if (attempts >= maxAttempts) {
        // If we can't find an unused image, reset and try again
        registeredImages.clear();
        attempts = 0;
      }
    } while (registeredImages.has(nImage) && attempts < maxAttempts);

    // Find an unused exchange position
    let nExchange: number;
    attempts = 0;
    
    do {
      nExchange = randomInt(0, examples.length - 1);
      attempts++;
      if (attempts >= maxAttempts) {
        registeredExchanges.clear();
        attempts = 0;
      }
    } while (registeredExchanges.has(nExchange) && attempts < maxAttempts);

    // Ensure values are valid
    nImage = nImage < 0 ? 1 : Math.floor(nImage);
    nExchange = Math.floor(nExchange);

    const exampleToExchange = examples[nExchange];
    if (!exampleToExchange) {
      console.warn(`Example image at index ${nExchange} not found`);
      return;
    }

    // Random delay for more natural appearance
    const delayTime = Math.random() * 238;
    await delay(delayTime);

    // Update image source
    const newSrc = `${dir}${prefix}${nImage}${ext}`;
    exampleToExchange.src = newSrc;

    // Register this image and exchange position
    registeredImages.add(nImage);
    registeredExchanges.add(nExchange);
  }, 2600);
}
