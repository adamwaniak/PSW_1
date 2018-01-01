<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Form.aspx.cs" Inherits="Form" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>

	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>



</head>
<body>

	<!--Nawigacja-->
	<nav class="navbar sticky-top navbar-expand-md navbar-dark bg-info">
    <div class="container">
        <a class="navbar-brand mr-5" href="Default.aspx">Arte</a>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link">Regulamin</a>
                </li>
                <li class="nav-item">
                    <a href="Form.aspx" class="nav-link">Rejestracja</a>
                </li>
                <li class="nav-item">
                    <a href="Info.aspx" class="nav-link">Mój Profil</a>
                </li>
            </ul>
			</div>
		</div>
		</nav>
	<!--Nawigacja-->

	<!--Jumbotron-->
	<div class="jumbotron text-center">
    <div class="container">
        <h1 class="display-3">Arte Art Prize</h1>
        <p class="lead">Rejestracja użytkownika</p>
        <hr class="my-4">
        <p>Wzięcie udziału w konkursie wymaga podania przez Ciebie kilku informacji. Wszystkie dane zawarte są w
            regulaminie konkursu.</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="#" role="button">Dowiedz się więcej</a>
        </p>
    </div>
	</div>
	<!--.Jumbotron-->

	<!--FormularzRejestracji-->
	<div class="container mb-4">
    	<form id="form1" runat="server">
		<div class="form-group">
        	<asp:Label ID="imie" runat="server" Text="Imie"></asp:Label>
			<br />
			<asp:RequiredFieldValidator ID="imieRequiredFieldValidator" runat="server" ControlToValidate="imie_txtBox" ErrorMessage="Imie jest wymagane" ForeColor="Red" Display="Dynamic"></asp:RequiredFieldValidator>
			<br/>
			<asp:TextBox ID="imie_txtBox" runat="server"></asp:TextBox><br/>

        </div>
        <div class="form-group">
        	<asp:Label ID="nazwisko" runat="server" Text="Nazwisko"></asp:Label>
			<br />
			<asp:RequiredFieldValidator ID="nazwiskoRequiredFieldValidator1" runat="server" ControlToValidate="nazwisko_txtBox" Display="Dynamic" ErrorMessage="Nazwisko jest wymagane" ForeColor="Red"></asp:RequiredFieldValidator>
			<br/>
			<asp:TextBox ID="nazwisko_txtBox" runat="server"></asp:TextBox><br/>
        </div>
        <div class="form-group">
        	<asp:Label ID="email" runat="server" Text="Email"></asp:Label>
			<br />
			<asp:RequiredFieldValidator ID="emailRequiredFieldValidator" runat="server" ControlToValidate="email_txtBox" Display="Dynamic" ErrorMessage="Email jest wymagany" ForeColor="Red"></asp:RequiredFieldValidator>
			<asp:RegularExpressionValidator ID="emailRegularExpressionValidator" runat="server" ControlToValidate="email_txtBox" Display="Dynamic" ErrorMessage="Nieprawidlowy format adresu email" ForeColor="Red"></asp:RegularExpressionValidator>
			<br/>
			<asp:TextBox ID="email_txtBox" runat="server"></asp:TextBox><br/>
        </div>
        <div class="form-group">
        	<asp:Label ID="haslo" runat="server" Text="Haslo"></asp:Label>
			<br />
			<asp:RequiredFieldValidator ID="hasloRequiredFieldValidator" runat="server" ControlToValidate="haslo_txtBox" Display="Dynamic" ErrorMessage="Haslo jest wymagane" ForeColor="Red"></asp:RequiredFieldValidator>
			<br/>
			<asp:TextBox ID="haslo_txtBox" runat="server"></asp:TextBox><br/>
        </div>
        <div class="form-group">
        	<asp:Label ID="powt_haaslo" runat="server" Text="Powtorz haslo"></asp:Label>
			<br />
			<asp:CompareValidator ID="hasloCompareValidator" runat="server" ControlToCompare="powt_haslo_txtBox" ControlToValidate="haslo_txtBox" Display="Dynamic" ErrorMessage="Wprowadz poprawne haslo" ForeColor="Red"></asp:CompareValidator>
			<br/>
			<asp:TextBox ID="powt_haslo_txtBox" runat="server"></asp:TextBox><br/>
        </div>
        <div class="form-group">
        	<asp:Label ID="kraj" runat="server" Text="Wybierz kraj pochodzenia"></asp:Label><br/>
			<asp:DropDownList ID="kraj_dropDownList" runat="server">
				<asp:ListItem>Polska</asp:ListItem>
				<asp:ListItem>Niemcy</asp:ListItem>
				<asp:ListItem>Ukraina</asp:ListItem>
				<asp:ListItem>Rosja</asp:ListItem>
			</asp:DropDownList><br/>
        </div>
        <div class="form-check">
			<asp:CheckBox ID="akceptacja_checkBox" runat="server" />
			<asp:Label ID="akceptacja" runat="server" Text="Akceptuję regulamin konkursu."></asp:Label><br/>
        </div>
        <input type="submit" class="btn btn-outline-primary" value="Wyślij">
        <input type="reset" class="btn btn-outline-danger" value="Wyczyść">

		<div>
			<asp:Label ID="outputLabel" runat="server" Visible="False"></asp:Label>
		</div>
		</form>
	</div>
	<!--.FormularzRejestracji-->

</body>
</html>
