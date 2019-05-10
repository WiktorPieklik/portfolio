#include "RegisterForm.h"

carrental::RegisterForm::RegisterForm(void)
{
	InitializeComponent();
	//
	//TODO: W tym miejscu dodaj kod konstruktora
	//
}

carrental::RegisterForm::~RegisterForm()
{
	if (components)
	{
		delete components;
	}
}


void carrental::RegisterForm::pictureBox2_Click(System::Object^  sender, System::EventArgs^  e)
{
	this->Close();
}

 System::Void carrental::RegisterForm::RcheckBox_CheckedChanged(System::Object^  sender, System::EventArgs^  e)
{
	if (RcheckBox->Checked == true)
	{
		RpasswordTextBox->UseSystemPasswordChar = false;
	}
	else
	{
		RpasswordTextBox->UseSystemPasswordChar = true;
	}
}

 void carrental::RegisterForm::Register()
 {
	 MySqlCommand^ check = gcnew MySqlCommand("select login from wypozyczalnia.clients where login='" + RloginTextBox->Text + "'", connecter);
	 MySqlCommand^ cmd = gcnew MySqlCommand("insert into wypozyczalnia.clients (name,surname,phoneNo,idCard,login,password,email) values('" + RnameTextBox->Text + "','" + RsurnameTextBox->Text + "','" + RphoneNoTextBox->Text + "','" + RidCardTextBox->Text + "','" + RloginTextBox->Text + "','" + RpasswordTextBox->Text + "','" + RemailTextBox->Text + "');", connecter);
	 MySqlDataReader^ reader;

	 try
	 {
		 connecter->Open();
		 reader = check->ExecuteReader();
		 int i = 0; //sprawdzam czy istnieje juz konto o tym samym loginie

		 while (reader->Read())
		 {
			 i++;
		 }

		 connecter->Close();

		 if (i > 0)
		 {
			 //wyœwietla napis "Nazwa zajêta!
			 RloginTextBox->Text = "Nazwa zajêta!";
			 RloginTextBox->ForeColor = System::Drawing::Color::Red;
		 }
		 else
		 {
			 try
			 {
				 connecter->Open();
				 reader = cmd->ExecuteReader();
				 MessageBox::Show("Pomyœlnie utworzono konto");
				 connecter->Close();

				 this->Close();
			 }
			 catch (Exception^ ex)
			 {
				 MessageBox::Show("B³¹d tworzenia konta: \n" + ex->Message);
			 }
		 }
	 }
	 catch (Exception^ ex)
	 {
		 MessageBox::Show("B³¹d tworzenia konta: \n" + ex->Message);
	 }
 }

 System::Void carrental::RegisterForm::RregisterButton_Click(System::Object^  sender, System::EventArgs^  e)
 {
	 Register();
 }

 System::Void carrental::RegisterForm::RloginTextBox_Enter(System::Object^  sender, System::EventArgs^  e)
 {
	 if (RloginTextBox->Text == "Nazwa zajêta!")
	 {
		 RloginTextBox->Text = "";
		 RloginTextBox->ForeColor = System::Drawing::Color::Black;
	 }
 }