class ActualStock {
  totalMeterCount: any = document.querySelector("#totalMeterCount");
  lotNumberValueActual: any = document.querySelector("#lotNumberValueActual");
  ActualFormSubmit: any = document.querySelector("#ActualFormSubmit");
  ActualBagCreate: any = document.querySelectorAll(".actualCreate");
  TotalMeter: any = document.querySelector("#TotalMeter");
  constructor() {}
  generateDynamicInput(url: any, latNumber: any, totalMeter: any) {
    (<HTMLInputElement>this.lotNumberValueActual).value = latNumber;
    (<HTMLInputElement>this.totalMeterCount).value = totalMeter;
    (<HTMLInputElement>this.TotalMeter).innerText = totalMeter;
    document.querySelector("#image_box")!.innerHTML = "";
    if (latNumber != null) {
      $.ajax({
        url: url + "fetchRecordActual",
        method: "post",
        data: {
          lotNumber: latNumber,
        },
        success: function (result) {
          let data = JSON.parse(result);

          if (data.status == "Success") {
            (<HTMLInputElement>(
              document.querySelector("#NewLotNumberValueArea")
            )).value = data.NewLotNumber;
            (<HTMLInputElement>(
              document.querySelector("#NewLotNumberValueArea")
            )).readOnly = true;
            let ActualDataValue = data.actualstockData;
            let innerHTMLValueEdit = "";
            for (let row in ActualDataValue) {
              innerHTMLValueEdit += `<div class='col-4 mb-3'>`;
              innerHTMLValueEdit += `<div class='input-group'>`;
              innerHTMLValueEdit += `<input type='number' name='actualCreate[]' class='form-control actualCreate'value="${ActualDataValue[row].numberMeter}" min="0" placeholder="" style="border: solid 1px #7952b3;">`;
              innerHTMLValueEdit += `</div>`;
              innerHTMLValueEdit += `</div>`;
            }
            document.querySelector("#forEdit")!.innerHTML = innerHTMLValueEdit;
          } else {
            (<HTMLInputElement>(
              document.querySelector("#NewLotNumberValueArea")
            )).readOnly = false;
            document.querySelector("#forEdit")!.innerHTML = "";
          }
        },
      });
    }
  }
  submitActualBeg() {
    let totalPreviousMeter = parseFloat(
      (<HTMLInputElement>this.totalMeterCount).value
    );
    let newLotNumber = <HTMLInputElement>(
      document.querySelector("#NewLotNumberValueArea")
    );
    let totalInput = document.querySelectorAll(".actualCreate");
    var x = 0;
    let Count = 0;
    for (let total of totalInput as any) {
      if (total.value != "") {
        Count += parseFloat(total.value);
        x++;
        total.classList.remove("is-invalid");
        total.style.borderColor = "#7952b3";
      } else {
        total.classList.add("is-invalid");
        total.style.borderColor = "red";
      }
    }
    // if (Count <= totalPreviousMeter && newLotNumber.value != "") {
    if (newLotNumber.value != "") {
      var myForm = <HTMLFormElement>this.ActualFormSubmit;
      myForm.submit();
    } else {
      (<HTMLFormElement>(
        document.getElementById("lotNumberValue")
      )).classList.add("is-invalid");
      alert("Invalid Lot number");
    }
  }
}

const Actual = new ActualStock();
