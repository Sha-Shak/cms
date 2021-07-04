<form action='file.php' action='post'>
  <select name='select' id='select'>
    <option value=''>Select an option</option>
    <option value='1'>1</option>
    <option value='2'>2</option>
    <option value='3'>3</option>
    <option value='4'>4</option>
    <option value='5'>5</option>
    <option value='6'>6</option>
    <option value='7'>7</option>
    <option value='8'>8</option>
  </select>
<input type='submit' onClick='if(!checkdropdown()) {alert("You need to select a value!"); return false;}' value='Submit form' />
</form>

function checkdropdown() {
  if(document.getElementById('select').value != "") {
    return true;
  }
  else {
    return false;
  }
}