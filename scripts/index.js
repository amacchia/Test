function rowClicked(row) {
	document.getElementById("editMonTips").value = row.cells["mon"].innerHTML;
	document.getElementById("editTueTips").value = row.cells["tue"].innerHTML;
	document.getElementById("editWedTips").value = row.cells["wed"].innerHTML;
	document.getElementById("editThrTips").value = row.cells["thr"].innerHTML;
	document.getElementById("editFriTips").value = row.cells["fri"].innerHTML;
	document.getElementById("editSatTips").value = row.cells["sat"].innerHTML;
	document.getElementById("editSunTips").value = row.cells["sun"].innerHTML;
	document.getElementById("editHoursWorked").value = row.cells["hoursWorked"].innerHTML;
	document.getElementById("editWeeklyPay").value = row.cells["weeklyPay"].innerHTML;
	document.getElementById("editWeekID").value = row.id.substr(3);
}
