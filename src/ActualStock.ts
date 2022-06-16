class ActualStock {
  totalMeterCount = document.querySelector("#totalMeterCount");
  lotNumberValueActual = document.querySelector("#lotNumberValueActual");
  ActualFormSubmit = document.querySelector("#ActualFormSubmit");
  ActualBagCreate = document.querySelectorAll(".actualCreate");
  constructor() {}
  generateDynamicInput(latNumber: any, totalMeter: any) {
    if (latNumber != null) {
      (<HTMLInputElement>this.lotNumberValueActual).value = latNumber;
      (<HTMLInputElement>this.totalMeterCount).value = totalMeter;
      document.querySelector("#image_box")!.innerHTML = "";
    }
  }
  submitActualBeg() {
    let totalPreviousMeter = parseFloat(
      (<HTMLInputElement>this.totalMeterCount).value
    );
    let totalInputName = this.ActualBagCreate;
    let totalInput = document.querySelectorAll(".actualCreate");
    var x = 0;
    let Count = 0;
    for (let total of totalInput as any) {
      Count += parseFloat(total.value);
      if (total.value != "") {
        x++;
        total.classList.remove("is-invalid");
        total.style.borderColor = "#7952b3";
      } else {
        total.classList.add("is-invalid");
        total.style.borderColor = "red";
      }
    }
    if (x == totalInput.length && Count <= totalPreviousMeter) {
      var myForm = <HTMLFormElement>this.ActualFormSubmit;
      myForm.submit();
      console.log(x, totalInput.length);
    } else {
      (<HTMLFormElement>(
        document.getElementById("lotNumberValue")
      )).classList.add("is-invalid");
      alert("your meter value is greater than to previous value");
    }
    console.log(Count);
    // var myForm = <HTMLFormElement>this.ActualFormSubmit;
    // myForm.submit();
  }
}

const Actual = new ActualStock();
