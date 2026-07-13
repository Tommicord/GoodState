import { showHousingExamples, startHousingCarousel } from "./uiHousing.js";
import { startHousingExampleExchanger } from "./uiExampleExchanger.js";

/**
 * Main application class that initializes all UI components
 */
export class App {
  constructor() {
    this.initialize();
  }

  /**
   * Initializes all UI components in sequence
   */
  private async initialize(): Promise<void> {
    try {
      await startHousingCarousel();
      await startHousingExampleExchanger();
      await showHousingExamples();
    } catch (error) {
      console.error("Error initializing application:", error);
    }
  }
}

// Initialize app when DOM is ready
document.addEventListener("DOMContentLoaded", () => {
  new App();
});
