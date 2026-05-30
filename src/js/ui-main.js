import { ShowHousingExamples, StartHousingCarousel } from "./ui-housing.js";
import { StartHousingExampleExchanger } from "./ui-example-exchanger.js";

export class App {
  constructor() {
    new Promise(
      (resolve, reject) => 
        resolve(StartHousingCarousel()
          .then(() => StartHousingExampleExchanger())
          .then(() => ShowHousingExamples())
        )
      );
  }
}

document.addEventListener("DOMContentLoaded", () => {
  new App();
});
