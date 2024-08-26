function getRadioButtonData() {
    const radioButtons = document.querySelectorAll('input[type="radio"]');
    const selectedRadioButton = Array.from(radioButtons).find(button => button.checked);
  
    if (selectedRadioButton) {
      const selectedValue = selectedRadioButton.value;
      console.log("Selected value:", selectedValue);
      // You can use the selectedValue for further processing
    } else {
      console.log("No radio button is selected.");
    }
  }