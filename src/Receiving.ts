class Receiving {
  receivingDate: any = document.querySelector("#receiving_date");
  partyName: any = document.querySelector("#partyName");
  lotNumber: any = document.querySelector("#lotNumber");
  quality: any = document.querySelector("#quality");
  color: any = document.querySelector("#color");
  weight: any = document.querySelector("#weight");
  width: any = document.querySelector("#width");
  unit: any = document.querySelector("#unit");
  begNumber: any = document.querySelector("#begNumber");
  val: any = document.querySelector("#val");
  id: any = document.querySelector("#id");
  editEid: any = document.querySelector("#billNumber");

  constructor() {
    this.showData();
  }
  addToList() {
    let partyName = this.partyName.value;
    let lotNumber = this.lotNumber.value;
    let quality = this.quality.value;
    let receivingDate = this.receivingDate.value;
    let color = this.color.value;
    let weight = this.weight.value;
    let unit = this.unit.value;
    let begNumber = this.begNumber.value;
    let condition = true;
    let val = this.val.value;
    let id = this.id.value;
    let width = this.width.value;
    if (weight == "") {
      condition = false;
      this.weight.classList.add("is-invalid");
    } else {
      this.weight.classList.remove("is-invalid");
    }
    if (width == "") {
      condition = false;
      this.width.classList.add("is-invalid");
    } else {
      this.width.classList.remove("is-invalid");
    }

    if (receivingDate == "") {
      condition = false;
      this.receivingDate.classList.add("is-invalid");
    } else {
      this.receivingDate.classList.remove("is-invalid");
    }
    if (partyName == "") {
      condition = false;
      this.partyName.classList.add("is-invalid");
    } else {
      this.partyName.classList.remove("is-invalid");
    }
    if (lotNumber == "") {
      condition = false;
      this.lotNumber.classList.add("is-invalid");
    } else {
      this.lotNumber.classList.remove("is-invalid");
    }
    if (quality == "") {
      condition = false;
      this.quality.classList.add("is-invalid");
    } else {
      this.quality.classList.remove("is-invalid");
    }
    if (color == "") {
      condition = false;
      this.color.classList.add("is-invalid");
    } else {
      this.color.classList.remove("is-invalid");
    }
    if (unit == "") {
      condition = false;
      this.unit.classList.add("is-invalid");
    } else {
      this.unit.classList.remove("is-invalid");
    }
    if (begNumber == "") {
      condition = false;
      this.begNumber.classList.add("is-invalid");
    } else {
      this.begNumber.classList.remove("is-invalid");
    }

    if (condition == true) {
      const formData = {
        receivingDate: receivingDate,
        partyName: partyName,
        width: width,
        lotNumber: lotNumber,
        quality: quality,
        color: color,
        weight: weight,
        unit: unit,
        begNumber: begNumber,
      };

      try {
        let arr = this.getLocalStorageItem();
        if (val == "edit") {
          arr[id].lotNumber = lotNumber;
          arr[id].quality = quality;
          arr[id].color = color;
          arr[id].weight = weight;
          arr[id].width = width;
          arr[id].unit = unit;
          arr[id].begNumber = begNumber;
          this.setLocalStorageItem(arr);
          this.receivingDate.disabled = true;
          this.partyName.disabled = true;
          this.showData();
          this.clearData();
        } else {
          arr.push(formData);
          this.setLocalStorageItem(arr);
          this.receivingDate.disabled = true;
          this.partyName.disabled = true;
          this.showData();
          this.clearData();
        }
      } catch (error: any) {
        console.log(error);
      }
    }
  }
  showData() {
    let storage = this.getLocalStorageItem();
    let htmlText: any = "";
    let j = 1;
    if (storage != null) {
      for (let key in storage) {
        htmlText += "<tr>";
        htmlText += `<td>${j++}</td>`;
        htmlText += "<td>" + storage[key].lotNumber + "</td>";
        htmlText += "<td>" + storage[key].quality + "</td>";
        htmlText += "<td>" + storage[key].color + "</td>";
        htmlText += "<td>" + storage[key].weight + "</td>";
        htmlText += "<td>" + storage[key].width + "</td>";
        htmlText += "<td>" + storage[key].unit + "</td>";
        htmlText += "<td>" + storage[key].begNumber + "</td>";
        htmlText += "<td>";
        htmlText += `<a href="javascript:void(0);" onclick='receiving.editData(${key})' class="action-icon">Edit</a>`;
        htmlText += `<a href="javascript:void(0);" onclick="receiving.deleteData(${key})" class="action-icon"> Delete</a>`;
        htmlText += "</tr>";
      }
      document.querySelector("#tbody")!.innerHTML = htmlText;
    }
  }

  editData(id: number) {
    let arr = this.getLocalStorageItem();
    this.lotNumber.value = arr[id].lotNumber;
    this.quality.value = arr[id].quality;
    this.color.value = arr[id].color;
    this.weight.value = arr[id].weight;
    this.width.value = arr[id].width;
    this.unit.value = arr[id].unit;
    this.begNumber.value = arr[id].begNumber;
    this.val.value = "edit";
    this.id.value = id;
  }

  deleteData(id: number) {
    let arr = this.getLocalStorageItem();
    arr.splice(id, 1);
    this.setLocalStorageItem(arr);
    this.showData();
  }
  clearData() {
    (<HTMLInputElement>document.getElementById("lotNumber")).value = "";
    (<HTMLInputElement>document.getElementById("quality")).value = "";
    (<HTMLInputElement>document.getElementById("color")).value = "";
    (<HTMLInputElement>document.getElementById("weight")).value = "";
    (<HTMLInputElement>document.getElementById("width")).value = "";
    (<HTMLInputElement>document.getElementById("unit")).value = "";
    (<HTMLInputElement>document.getElementById("begNumber")).value = "";
    (<HTMLInputElement>document.getElementById("val")).value = "";
    (<HTMLInputElement>document.getElementById("id")).value = "";
    document.getElementById("submit")?.classList.add("d-block");
    document.getElementById("submit")?.classList.remove("d-none");
  }

  setLocalStorageItem(value: any) {
    localStorage.setItem("Receiving", JSON.stringify(value));
  }

  getLocalStorageItem() {
    let arr = JSON.parse(localStorage.getItem("Receiving") || "[]");
    return arr;
  }

  clearLocalStorageItem() {
    let arr = localStorage.removeItem("Receiving");
    return arr;
  }

  submitForm(url: any, base_url: any) {
    let storage = this.getLocalStorageItem();
    let BillNumber = this.editEid.value;
    if (storage != null) {
      $.ajax({
        url: url,
        method: "POST",
        data: {
          storage: storage,
          BillNumber: BillNumber,
        },
        success: function (result: any) {
          let data = JSON.parse(result);
          if (data.status == "Success") {
            console.log(data.status);
            window.location.href = base_url + "receiving";
          }
        },
      });
    }
  }
}
const receiving = new Receiving();
