using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class Default2 : System.Web.UI.Page
{
	protected void Page_Load(object sender, EventArgs e)
	{
		if (IsPostBack)
		{
			Validate();

			if (IsValid)
			{
				string imie = imie_txtBox.Text;
				string nazwisko = nazwisko_txtBox.Text;
				string email = email_txtBox.Text;
				string haslo = haslo_txtBox.Text;
				string kraj = kraj_DropDownList.Text;

				outputLabel.Text = "Dziękujemy za dokonanie rejestracji.<br/>" +
					"Otrzymaliśmy następujące dane:<br/>";
				outputLabel.Text += String.Format("Imie: {0}{1}E-mail:{2}{1}Phone:{3}", imie, "<br/>", email, kraj);
				outputLabel.Visible = true;
			}
		}
	}

}