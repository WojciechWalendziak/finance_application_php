
	function expand_table(table_to_expand, amount)
	{
		let table_to_expand_rows = table_to_expand.rows;
		let cell_to_check = table_to_expand_rows[table_to_expand_rows.length - 1].getElementsByTagName("td")[0];
		let cell_to_check_text = cell_to_check.textContent || cell_to_check.innerText;
		if(cell_to_check_text != "TOTAL AMOUNT")
		{
			table_expanded = table_to_expand.insertRow(-1);
			table_expanded.className = 'row';
			let cell_one = table_expanded.insertCell(0);
			let cell_two = table_expanded.insertCell(1);
			cell_one.innerHTML = "TOTAL AMOUNT";
			cell_one.className = 'class="col-sm-3';
			cell_one.style.display = "flex";
			cell_two.innerHTML = amount;
			cell_two.className = 'class="col-sm-3';
			cell_two.style.display = "flex";
			//cell_one.innerHTML = '<td class="col-sm-3" style="display: flex;">TOTAL AMOUNT</td>';
			//cell_one.style.display = "flex";
			//cell_two.innerHTML = amount;
			//cell_two.innerHTML = '<td class="col-sm-3">' + amount + '</td>';
			//cell_two.style.display = "flex";
		}
		else
		{
			let cell_to_update = table_to_expand_rows[table_to_expand_rows.length - 1].getElementsByTagName("td")[1];
			cell_to_update.innerHTML = amount;
			cell_to_update.style.display = "flex";
		}
	}

	var today = new Date();
	
	let current_date = {

		current_year: today.getFullYear(),
		current_month: today.getMonth() + 1,
		current_day: today.getDate(),
		return_year : function() {
			return this.current_year;
		  },
		return_month : function() {
			return this.current_month;
		  },
		return_day : function() {
			return this.current_day;
		  }
	};

	function get_table(requested_table)
	{
		let my_table = document.getElementById(requested_table);
		return my_table;
	}

	function get_selected_field()
	{
		let selected_value = document.getElementById("period");
		selected_value = selected_value.value;
		return selected_value;
	}

	function close_modal()
	{
		let modal = document.getElementById("myModal");
		modal.style.display = "none";
	}

	function transform_table()
	{
		let income_table = get_table("income_table");
		let expense_table = get_table("expense_table");
		let current_year = current_date.return_year();
		let current_month = current_date.return_month();
		let current_day = current_date.return_day();

		let period = get_selected_field();
		let period_string = String(period);
		if(period_string != "niestandardowy")
		{
			let sum_income = filter_by_standard_timeframes(income_table, period, current_year, current_month, current_day)
			expand_table(income_table, sum_income);
			let sum_expense = filter_by_standard_timeframes(expense_table, period, current_year, current_month, current_day)
			expand_table(expense_table, sum_expense);
		}
		else
		{
			let modal = document.getElementById("myModal");
			modal.style.display = "flex";
			sum = 0;
		}
	}
	function filter_by_own_timeframe()
	{
		let income_table = get_table("income_table");
		let expense_table = get_table("expense_table");
		let sum_income = summarize_by_own_timeframe(income_table);
		let sum_expense = summarize_by_own_timeframe(expense_table);
		expand_table(income_table, sum_income)
		expand_table(expense_table, sum_expense)
		sort_table(income_table);
		sort_table(expense_table);
	}
	function summarize_by_own_timeframe(requested_table)
	{
		let modal_box = document.getElementById("myModal");

		let start_date = document.getElementById("start_date").value;
		let end_date = document.getElementById("end_date").value;
		let [start_year, start_month, start_day] = start_date.split('-');
		let [end_year, end_month, end_day] = end_date.split('-');

		modal_box.style.display = "none";
		let requested_table_rows = requested_table.rows;
		let sum = 0;
		for (let i = 1; i < requested_table_rows.length; i++)
		{
			let bill_date = requested_table_rows[i].getElementsByTagName("td")[2];
			let txtValue = bill_date.textContent || bill_date.innerText;
			let [year_to_check, month_to_check, day_to_check] = txtValue.split('-');

			let bill_amount = requested_table_rows[i].getElementsByTagName("td")[1];
			let amountValue = bill_amount.textContent || bill_date.innerText;
			let amount = Number(amountValue);

			sum = sum + filter_table(start_year, start_month, start_day, end_year, end_month, end_day, year_to_check, month_to_check, day_to_check, requested_table_rows[i], amount);
		}
		return sum;
	}
	function filter_by_standard_timeframes(requested_table, period, current_year, current_month, current_day)
	{
		let sum = 0;
		let requested_table_rows = requested_table.rows;
		for (let i = 1; i < requested_table_rows.length; i++)
		{
			let cell_to_check = requested_table_rows[i].getElementsByTagName("td")[0];
			let cell_to_check_text = cell_to_check.textContent || cell_to_check.innerText;
			if(cell_to_check_text != "TOTAL AMOUNT")
			{
				let bill_date = requested_table_rows[i].getElementsByTagName("td")[2];
				let txtValue = bill_date.textContent || bill_date.innerText;
				let [year_to_check, month_to_check, day_to_check] = txtValue.split('-');
				let bill_amount = requested_table_rows[i].getElementsByTagName("td")[1];
				let amountValue = bill_amount.textContent || bill_date.innerText;
				let amount = Number(amountValue);

				switch (period) {
					case "biezacy_miesiac":
						{
							sum = sum + filter_table(current_year, current_month, 1, current_year, current_month, current_day, year_to_check, month_to_check, day_to_check, requested_table_rows[i], amount);
						};
					break;
					case "poprzedni_miesiac":
						{
							if(current_month > 1)
							{
								sum = sum + filter_table(current_year, current_month - 1, current_day, current_year, current_month, current_day, year_to_check, month_to_check, day_to_check, requested_table_rows[i], amount);
							}
							else
							{
								sum = sum + filter_table(current_year - 1, 12, current_day, current_year, current_month, current_day, year_to_check, month_to_check, day_to_check, requested_table_rows[i], amount);
							}
						};
					break;
					case "biezacy_rok":
						{
							{
								sum = sum + filter_table(current_year, 1, 1, current_year, current_month, current_day, year_to_check, month_to_check, day_to_check, requested_table_rows[i], amount);
							};
						};
					break;
					case "cala_historia":
						{
							{
								sum = sum + amount;
								requested_table_rows[i].style.display = "flex";
							};
						};
					break;
				}
			}
		}
		return sum;
	}

function filter_table(start_year, start_month, start_day, end_year, end_month, end_day, checked_year, checked_month, checked_day, checked_row, amount)
{
	if(start_year == end_year)
	{
		if(start_month == end_month)
		{
			if(checked_year == start_year && checked_month == start_month && checked_day >= start_day && checked_day <= end_day)
			{
				checked_row.style.display = "flex";
				sum = amount;
			}
			else
			{
				checked_row.style.display = "none";
				sum = 0;
			}
		}
		else
		{
			if(checked_year == start_year && checked_month == start_month && checked_day >= start_day)
			{
				checked_row.style.display = "flex";
				sum = amount;
			}
			else if(checked_year == start_year && checked_month == end_month && checked_day <= end_day)
			{
				checked_row.style.display = "flex";
				sum = amount;
			}
			else if(checked_year == start_year && checked_month > start_month && checked_month < end_month)
			{
				checked_row.style.display = "flex";
				sum = amount;
			}
			else
			{
				checked_row.style.display = "none";
				sum = 0;
			}
		}
	}
	else
	{
		if(checked_year == start_year)
		{
			if(checked_month == start_month)
			{
				if(checked_day >= start_day)
				{
					checked_row.style.display = "flex";
					sum = amount;
				}
				else
				{
					checked_row.style.display = "none";
					sum = 0;
				}
			}
			else if(checked_month > start_month)
			{
				checked_row.style.display = "flex";
				sum = amount;
			}
			else
			{
				checked_row.style.display = "none";
				sum = 0;
			}
		}
		else if(checked_year == end_year)
		{
			if(checked_month == end_month)
			{
				if(checked_day <= end_day)
				{
					checked_row.style.display = "flex";
					sum = amount;
				}
				else
				{
					checked_row.style.display = "none";
					sum = 0;
				}
			}
			else if(checked_month < end_month)
			{
				checked_row.style.display = "flex";
				sum = amount;
			}
			else
			{
				checked_row.style.display = "none";
				sum = 0;
			}
		}
		else if(checked_year > start_year && checked_year < end_year)
		{
			checked_row.style.display = "flex";
			sum = amount;
		}
		else
		{
			checked_row.style.display = "none";
			sum = 0;
		}
	}
	return sum;
}
