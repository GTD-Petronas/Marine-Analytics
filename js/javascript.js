

// Ovid
function addRow_ovid(tableID) {

  var table = document.getElementById(tableID);

  var rowCount = table.rows.length;
  var row = table.insertRow(rowCount);

  var colCount = table.rows[0].cells.length;

  for(var i=0; i<colCount; i++) {

    var newcell = row.insertCell(i);
    newcell.innerHTML = table.rows[1].cells[i].innerHTML;


  }
}

function deleteRow_ovid(tableID) {

  var table = document.getElementById("dataTable_ovid");
  var rowCount = table.rows.length;
  var i = tableID.parentNode.parentNode.rowIndex;
  if(rowCount <= 2) {
    alert("Cannot Delete All Lines.");
  }else{
    document.getElementById("dataTable_ovid").deleteRow(i);
  }
}

// TOD
function addRow_tod(tableID) {

  var table = document.getElementById(tableID);

  var rowCount = table.rows.length;
  var row = table.insertRow(rowCount);

  var colCount = table.rows[0].cells.length;

  for(var i=0; i<colCount; i++) {

    var newcell = row.insertCell(i);

    newcell.innerHTML = table.rows[1].cells[i].innerHTML;
    //alert(newcell.childNodes);
    // switch(newcell.childNodes[0].type) {
    //   case "text":
    //   newcell.childNodes[0].value = "";
    //   break;
    //   case "textarea":
    //   newcell.childNodes[0].value = "";
    //   break;
    //   case "checkbox":
    //   newcell.childNodes[0].checked = false;
    //   break;
    //   case "select-one":
    //   newcell.childNodes[0].selectedIndex = 0;
    //   break;
    // }
  }
}

function deleteRow_tod(tableID) {

  var table = document.getElementById("dataTable_tod");
  var rowCount = table.rows.length;
  var i = tableID.parentNode.parentNode.rowIndex;
  if(rowCount <= 2) {
    alert("Cannot Delete All Lines.");
  }else{
    document.getElementById("dataTable_tod").deleteRow(i);
  }
}
//

// OSIS
function addRow_osis(tableID) {

  var table = document.getElementById(tableID);

  var rowCount = table.rows.length;
  var row = table.insertRow(rowCount);

  var colCount = table.rows[0].cells.length;

  for(var i=0; i<colCount; i++) {

    var newcell = row.insertCell(i);

    newcell.innerHTML = table.rows[1].cells[i].innerHTML;
    //alert(newcell.childNodes);
    switch(newcell.childNodes[0].type) {
      case "text":
      newcell.childNodes[0].value = "";
      break;
      case "textarea":
      newcell.childNodes[0].value = "";
      break;
      case "checkbox":
      newcell.childNodes[0].checked = false;
      break;
      case "select-one":
      newcell.childNodes[0].selectedIndex = 0;
      break;
    }
  }
}

function deleteRow_osis(tableID) {

  var table = document.getElementById("dataTable_osis");
  var rowCount = table.rows.length;
  var i = tableID.parentNode.parentNode.rowIndex;
  if(rowCount <= 2) {
    alert("Cannot Delete All Lines.");
  }else{
    document.getElementById("dataTable_osis").deleteRow(i);
  }
}
//

// Fuel
function addRow_fuel(tableID) {

  var table = document.getElementById(tableID);

  var rowCount = table.rows.length;
  var row = table.insertRow(rowCount);

  var colCount = table.rows[0].cells.length;

  for(var i=0; i<colCount; i++) {

    var newcell = row.insertCell(i);

    newcell.innerHTML = table.rows[1].cells[i].innerHTML;
    //alert(newcell.childNodes);
    switch(newcell.childNodes[0].type) {
      case "text":
      newcell.childNodes[0].value = "";
      break;
      case "textarea":
      newcell.childNodes[0].value = "";
      break;
      case "checkbox":
      newcell.childNodes[0].checked = false;
      break;
      case "select-one":
      newcell.childNodes[0].selectedIndex = 0;
      break;
    }
  }
}

function deleteRow_fuel(tableID) {

  var table = document.getElementById("dataTable_fuel");
  var rowCount = table.rows.length;
  var i = tableID.parentNode.parentNode.rowIndex;
  if(rowCount <= 2) {
    alert("Cannot Delete All Lines.");
  }else{
    document.getElementById("dataTable_fuel").deleteRow(i);
  }
}
//

//CCTV
function addRow_cctv(tableID) {

  var table = document.getElementById(tableID);

  var rowCount = table.rows.length;
  var row = table.insertRow(rowCount);

  var colCount = table.rows[0].cells.length;

  for(var i=0; i<colCount; i++) {

    var newcell = row.insertCell(i);

    newcell.innerHTML = table.rows[1].cells[i].innerHTML;
    //alert(newcell.childNodes);
    switch(newcell.childNodes[0].type) {
      case "text":
      newcell.childNodes[0].value = "";
      break;
      case "textarea":
      newcell.childNodes[0].value = "";
      break;
      case "checkbox":
      newcell.childNodes[0].checked = false;
      break;
      case "select-one":
      newcell.childNodes[0].selectedIndex = 0;
      break;
    }
  }
}

function deleteRow_cctv(tableID) {

  var table = document.getElementById("dataTable_cctv");
  var rowCount = table.rows.length;
  var i = tableID.parentNode.parentNode.rowIndex;
  if(rowCount <= 2) {
    alert("Cannot Delete All Lines.");
  }else{
    document.getElementById("dataTable_cctv").deleteRow(i);
  }
}
//

//VTS
function addRow_vts(tableID) {

  var table = document.getElementById(tableID);

  var rowCount = table.rows.length;
  var row = table.insertRow(rowCount);

  var colCount = table.rows[0].cells.length;

  for(var i=0; i<colCount; i++) {

    var newcell = row.insertCell(i);

    newcell.innerHTML = table.rows[1].cells[i].innerHTML;
    //alert(newcell.childNodes);
    switch(newcell.childNodes[0].type) {
      case "text":
      newcell.childNodes[0].value = "";
      break;
      case "textarea":
      newcell.childNodes[0].value = "";
      break;
      case "checkbox":
      newcell.childNodes[0].checked = false;
      break;
      case "select-one":
      newcell.childNodes[0].selectedIndex = 0;
      break;
    }
  }
}

function deleteRow_vts(tableID) {

  var table = document.getElementById("dataTable_vts");
  var rowCount = table.rows.length;
  var i = tableID.parentNode.parentNode.rowIndex;
  if(rowCount <= 2) {
    alert("Cannot Delete All Lines.");
  }else{
    document.getElementById("dataTable_vts").deleteRow(i);
  }
}
//

//FIFI
function addRow_fifi(tableID) {

  var table = document.getElementById(tableID);

  var rowCount = table.rows.length;
  var row = table.insertRow(rowCount);

  var colCount = table.rows[0].cells.length;

  for(var i=0; i<colCount; i++) {

    var newcell = row.insertCell(i);

    newcell.innerHTML = table.rows[1].cells[i].innerHTML;
    //alert(newcell.childNodes);
    switch(newcell.childNodes[0].type) {
      case "text":
      newcell.childNodes[0].value = "";
      break;
      case "textarea":
      newcell.childNodes[0].value = "";
      break;
      case "checkbox":
      newcell.childNodes[0].checked = false;
      break;
      case "select-one":
      newcell.childNodes[0].selectedIndex = 0;
      break;
    }
  }
}

function deleteRow_fifi(tableID) {

  var table = document.getElementById("dataTable_fifi");
  var rowCount = table.rows.length;
  var i = tableID.parentNode.parentNode.rowIndex;
  if(rowCount <= 2) {
    alert("Cannot Delete All Lines.");
  }else{
    document.getElementById("dataTable_fifi").deleteRow(i);
  }
}
//

//LSA
function addRow_LSA(tableID) {

  var table = document.getElementById(tableID);

  var rowCount = table.rows.length;
  var row = table.insertRow(rowCount);

  var colCount = table.rows[0].cells.length;

  for(var i=0; i<colCount; i++) {

    var newcell = row.insertCell(i);

    newcell.innerHTML = table.rows[1].cells[i].innerHTML;
    //alert(newcell.childNodes);
    switch(newcell.childNodes[0].type) {
      case "text":
      newcell.childNodes[0].value = "";
      break;
      case "textarea":
      newcell.childNodes[0].value = "";
      break;
      case "checkbox":
      newcell.childNodes[0].checked = false;
      break;
      case "select-one":
      newcell.childNodes[0].selectedIndex = 0;
      break;
    }
  }
}

function deleteRow_LSA(tableID) {

  var table = document.getElementById("dataTable_LSA");
  var rowCount = table.rows.length;
  var i = tableID.parentNode.parentNode.rowIndex;
  if(rowCount <= 2) {
    alert("Cannot Delete All Lines.");
  }else{
    document.getElementById("dataTable_LSA").deleteRow(i);
  }
}
//

//FFA
function addRow_FFA(tableID) {

  var table = document.getElementById(tableID);

  var rowCount = table.rows.length;
  var row = table.insertRow(rowCount);

  var colCount = table.rows[0].cells.length;

  for(var i=0; i<colCount; i++) {

    var newcell = row.insertCell(i);

    newcell.innerHTML = table.rows[1].cells[i].innerHTML;
    //alert(newcell.childNodes);
    switch(newcell.childNodes[0].type) {
      case "text":
      newcell.childNodes[0].value = "";
      break;
      case "textarea":
      newcell.childNodes[0].value = "";
      break;
      case "checkbox":
      newcell.childNodes[0].checked = false;
      break;
      case "select-one":
      newcell.childNodes[0].selectedIndex = 0;
      break;
    }
  }
}

function deleteRow_FFA(tableID) {

  var table = document.getElementById("dataTable_FFA");
  var rowCount = table.rows.length;
  var i = tableID.parentNode.parentNode.rowIndex;
  if(rowCount <= 2) {
    alert("Cannot Delete All Lines.");
  }else{
    document.getElementById("dataTable_FFA").deleteRow(i);
  }
}
//

//Load
function addRow_Load(tableID) {

  var table = document.getElementById(tableID);

  var rowCount = table.rows.length;
  var row = table.insertRow(rowCount);

  var colCount = table.rows[0].cells.length;

  for(var i=0; i<colCount; i++) {

    var newcell = row.insertCell(i);

    newcell.innerHTML = table.rows[1].cells[i].innerHTML;
    //alert(newcell.childNodes);
    switch(newcell.childNodes[0].type) {
      case "text":
      newcell.childNodes[0].value = "";
      break;
      case "textarea":
      newcell.childNodes[0].value = "";
      break;
      case "checkbox":
      newcell.childNodes[0].checked = false;
      break;
      case "select-one":
      newcell.childNodes[0].selectedIndex = 0;
      break;
    }
  }
}

function deleteRow_Load(tableID) {

  var table = document.getElementById("dataTable_Load");
  var rowCount = table.rows.length;
  var i = tableID.parentNode.parentNode.rowIndex;
  if(rowCount <= 2) {
    alert("Cannot Delete All Lines.");
  }else{
    document.getElementById("dataTable_Load").deleteRow(i);
  }
}
//

//P&g
function addRow_PG(tableID) {

  var table = document.getElementById(tableID);

  var rowCount = table.rows.length;
  var row = table.insertRow(rowCount);

  var colCount = table.rows[0].cells.length;

  for(var i=0; i<colCount; i++) {

    var newcell = row.insertCell(i);

    newcell.innerHTML = table.rows[1].cells[i].innerHTML;
    //alert(newcell.childNodes);
    switch(newcell.childNodes[0].type) {
      case "text":
      newcell.childNodes[0].value = "";
      break;
      case "textarea":
      newcell.childNodes[0].value = "";
      break;
      case "checkbox":
      newcell.childNodes[0].checked = false;
      break;
      case "select-one":
      newcell.childNodes[0].selectedIndex = 0;
      break;
    }
  }
}

function deleteRow_PG(tableID) {

  var table = document.getElementById("dataTable_PG");
  var rowCount = table.rows.length;
  var i = tableID.parentNode.parentNode.rowIndex;
  if(rowCount <= 2) {
    alert("Cannot Delete All Lines.");
  }else{
    document.getElementById("dataTable_PG").deleteRow(i);
  }
}
//

//Communication
function addRow_Commu(tableID) {

  var table = document.getElementById(tableID);

  var rowCount = table.rows.length;
  var row = table.insertRow(rowCount);

  var colCount = table.rows[0].cells.length;

  for(var i=0; i<colCount; i++) {

    var newcell = row.insertCell(i);

    newcell.innerHTML = table.rows[1].cells[i].innerHTML;
    //alert(newcell.childNodes);
    switch(newcell.childNodes[0].type) {
      case "text":
      newcell.childNodes[0].value = "";
      break;
      case "textarea":
      newcell.childNodes[0].value = "";
      break;
      case "checkbox":
      newcell.childNodes[0].checked = false;
      break;
      case "select-one":
      newcell.childNodes[0].selectedIndex = 0;
      break;
    }
  }
}

function deleteRow_Commu(tableID) {

  var table = document.getElementById("dataTable_Commu");
  var rowCount = table.rows.length;
  var i = tableID.parentNode.parentNode.rowIndex;
  if(rowCount <= 2) {
    alert("Cannot Delete All Lines.");
  }else{
    document.getElementById("dataTable_Commu").deleteRow(i);
  }
}
//

//Quarterty
function addRow_Quart(tableID) {

  var table = document.getElementById(tableID);

  var rowCount = table.rows.length;
  var row = table.insertRow(rowCount);

  var colCount = table.rows[0].cells.length;

  for(var i=0; i<colCount; i++) {

    var newcell = row.insertCell(i);

    newcell.innerHTML = table.rows[1].cells[i].innerHTML;
    //alert(newcell.childNodes);
    switch(newcell.childNodes[0].type) {
      case "text":
      newcell.childNodes[0].value = "";
      break;
      case "textarea":
      newcell.childNodes[0].value = "";
      break;
      case "checkbox":
      newcell.childNodes[0].checked = false;
      break;
      case "select-one":
      newcell.childNodes[0].selectedIndex = 0;
      break;
    }
  }
}

function deleteRow_Quart(tableID) {

  var table = document.getElementById("dataTable_Quart");
  var rowCount = table.rows.length;
  var i = tableID.parentNode.parentNode.rowIndex;
  if(rowCount <= 2) {
    alert("Cannot Delete All Lines.");
  }else{
    document.getElementById("dataTable_Quart").deleteRow(i);
  }
}
//

//Hull
function addRow_Hull(tableID) {

  var table = document.getElementById(tableID);

  var rowCount = table.rows.length;
  var row = table.insertRow(rowCount);

  var colCount = table.rows[0].cells.length;

  for(var i=0; i<colCount; i++) {

    var newcell = row.insertCell(i);

    newcell.innerHTML = table.rows[1].cells[i].innerHTML;
    //alert(newcell.childNodes);
    switch(newcell.childNodes[0].type) {
      case "text":
      newcell.childNodes[0].value = "";
      break;
      case "textarea":
      newcell.childNodes[0].value = "";
      break;
      case "checkbox":
      newcell.childNodes[0].checked = false;
      break;
      case "select-one":
      newcell.childNodes[0].selectedIndex = 0;
      break;
    }
  }
}

function deleteRow_Hull(tableID) {

  var table = document.getElementById("dataTable_Hull");
  var rowCount = table.rows.length;
  var i = tableID.parentNode.parentNode.rowIndex;
  if(rowCount <= 2) {
    alert("Cannot Delete All Lines.");
  }else{
    document.getElementById("dataTable_Hull").deleteRow(i);
  }
}
//

//Navigation
function addRow_Navi(tableID) {

  var table = document.getElementById(tableID);

  var rowCount = table.rows.length;
  var row = table.insertRow(rowCount);

  var colCount = table.rows[0].cells.length;

  for(var i=0; i<colCount; i++) {

    var newcell = row.insertCell(i);

    newcell.innerHTML = table.rows[1].cells[i].innerHTML;
    //alert(newcell.childNodes);
    switch(newcell.childNodes[0].type) {
      case "text":
      newcell.childNodes[0].value = "";
      break;
      case "textarea":
      newcell.childNodes[0].value = "";
      break;
      case "checkbox":
      newcell.childNodes[0].checked = false;
      break;
      case "select-one":
      newcell.childNodes[0].selectedIndex = 0;
      break;
    }
  }
}

function deleteRow_Navi(tableID) {

  var table = document.getElementById("dataTable_Navi");
  var rowCount = table.rows.length;
  var i = tableID.parentNode.parentNode.rowIndex;
  if(rowCount <= 2) {
    alert("Cannot Delete All Lines.");
  }else{
    document.getElementById("dataTable_Navi").deleteRow(i);
  }
}
//
//Other
function addRow_other(tableID) {

  var table = document.getElementById(tableID);

  var rowCount = table.rows.length;
  var row = table.insertRow(rowCount);

  var colCount = table.rows[0].cells.length;

  for(var i=0; i<colCount; i++) {

    var newcell = row.insertCell(i);

    newcell.innerHTML = table.rows[1].cells[i].innerHTML;
    //alert(newcell.childNodes);
    switch(newcell.childNodes[0].type) {
      case "text":
      newcell.childNodes[0].value = "";
      break;
      case "textarea":
      newcell.childNodes[0].value = "";
      break;
      case "checkbox":
      newcell.childNodes[0].checked = false;
      break;
      case "select-one":
      newcell.childNodes[0].selectedIndex = 0;
      break;
    }
  }
}

function deleteRow_other(tableID) {

  var table = document.getElementById("dataTable_other");
  var rowCount = table.rows.length;
  var i = tableID.parentNode.parentNode.rowIndex;
  if(rowCount <= 2) {
    alert("Cannot Delete All Lines.");
  }else{
    document.getElementById("dataTable_other").deleteRow(i);
  }
}
//

//Brief
function addRow_Brief(tableID) {

  var table = document.getElementById(tableID);

  var rowCount = table.rows.length;
  var row = table.insertRow(rowCount);

  var colCount = table.rows[0].cells.length;

  for(var i=0; i<colCount; i++) {

    var newcell = row.insertCell(i);

    newcell.innerHTML = table.rows[1].cells[i].innerHTML;
    //alert(newcell.childNodes);
    switch(newcell.childNodes[0].type) {
      case "text":
      newcell.childNodes[0].value = "";
      break;
      case "textarea":
      newcell.childNodes[0].value = "";
      break;
      case "checkbox":
      newcell.childNodes[0].checked = false;
      break;
      case "select-one":
      newcell.childNodes[0].selectedIndex = 0;
      break;
    }
  }
}

function deleteRow_Brief(tableID) {

  var table = document.getElementById("dataTable_Brief");
  var rowCount = table.rows.length;
  var i = tableID.parentNode.parentNode.rowIndex;
  if(rowCount <= 2) {
    alert("Cannot Delete All Lines.");
  }else{
    document.getElementById("dataTable_Brief").deleteRow(i);
  }
}
//

//Positive
function addRow_Positive(tableID) {

  var table = document.getElementById(tableID);

  var rowCount = table.rows.length;
  var row = table.insertRow(rowCount);

  var colCount = table.rows[0].cells.length;

  for(var i=0; i<colCount; i++) {

    var newcell = row.insertCell(i);

    newcell.innerHTML = table.rows[1].cells[i].innerHTML;
    //alert(newcell.childNodes);
    switch(newcell.childNodes[0].type) {
      case "text":
      newcell.childNodes[0].value = "";
      break;
      case "textarea":
      newcell.childNodes[0].value = "";
      break;
      case "checkbox":
      newcell.childNodes[0].checked = false;
      break;
      case "select-one":
      newcell.childNodes[0].selectedIndex = 0;
      break;
    }
  }
}

function deleteRow_Positive(tableID) {

  var table = document.getElementById("dataTable_Positive");
  var rowCount = table.rows.length;
  var i = tableID.parentNode.parentNode.rowIndex;
  if(rowCount <= 2) {
    alert("Cannot Delete All Lines.");
  }else{
    document.getElementById("dataTable_Positive").deleteRow(i);
  }
}
//


//Inspection
function addRow_Inspection(tableID) {

  var table = document.getElementById(tableID);

  var rowCount = table.rows.length;
  var row = table.insertRow(rowCount);

  var colCount = table.rows[0].cells.length;

  for(var i=0; i<colCount; i++) {

    var newcell = row.insertCell(i);

    newcell.innerHTML = table.rows[1].cells[i].innerHTML;
    //alert(newcell.childNodes);
    switch(newcell.childNodes[0].type) {
      case "text":
      newcell.childNodes[0].value = "";
      break;
      case "textarea":
      newcell.childNodes[0].value = "";
      break;
      case "checkbox":
      newcell.childNodes[0].checked = false;
      break;
      case "select-one":
      newcell.childNodes[0].selectedIndex = 0;
      break;
    }
  }
}

function deleteRow_Inspection(tableID) {

  var table = document.getElementById("dataTable_Inspection");
  var rowCount = table.rows.length;
  var i = tableID.parentNode.parentNode.rowIndex;
  if(rowCount <= 2) {
    alert("Cannot Delete All Lines.");
  }else{
    document.getElementById("dataTable_Inspection").deleteRow(i);
  }
}



//dropdown 1-100 finding
var selectpax = document.getElementById("pax");
var contents;

for (let i = 1; i <= 100; i++) {
  contents += "<option>" + i + "</option>";
}

selectpax.innerHTML = contents;


var selectpax = document.getElementById("pax1");
var contents;

for (let i = 1; i <= 100; i++) {
  contents += "<option>" + i + "</option>";
}

selectpax.innerHTML = contents;
