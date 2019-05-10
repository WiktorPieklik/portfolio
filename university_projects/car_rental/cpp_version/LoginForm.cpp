#include "LoginForm.h"

using namespace System;
using namespace System::Windows::Forms;

[STAThreadAttribute]
int main()
{
	Application::EnableVisualStyles();
	Application::SetCompatibleTextRenderingDefault(false);
	carrental::LoginForm form;
	Application::Run(%form);

	return 0;
}

carrental::LoginForm::LoginForm(void)
{
	InitializeComponent();
	//
	//TODO: W tym miejscu dodaj kod konstruktora
	//
}

carrental::LoginForm::~LoginForm()
{
	if (components)
	{
		delete components;
	}
}


System::Void carrental::LoginForm::LexitButton_Click(System::Object^  sender, System::EventArgs^  e)
{
	Application::Exit();
}

System::Void carrental::LoginForm::LloginTextBox_Enter(System::Object^  sender, System::EventArgs^  e)
{
	if (LloginTextBox->Text == "Login")
	{
		LloginTextBox->Text = "";
	}
}

System::Void carrental::LoginForm::LloginTextBox_Leave(System::Object^  sender, System::EventArgs^  e)
{
	if (LloginTextBox->TextLength == 0)
	{
		LloginTextBox->Text = "Login";
	}
}

System::Void carrental::LoginForm::LpasswordTextBox_Enter(System::Object^  sender, System::EventArgs^  e)
{
	if (LpasswordTextBox->Text == "Has³o")
	{
		LpasswordTextBox->Text = "";
		LpasswordTextBox->UseSystemPasswordChar = true;
	}
}

System::Void carrental::LoginForm::LpasswordTextBox_Leave(System::Object^  sender, System::EventArgs^  e)
{
	if (LpasswordTextBox->TextLength == 0)
	{
		LpasswordTextBox->UseSystemPasswordChar = false;
		LpasswordTextBox->Text = "Has³o";
	}
}

System::Void carrental::LoginForm::button2_Click(System::Object^  sender, System::EventArgs^  e)
{
	RegisterForm^ rForm = gcnew RegisterForm();
	rForm->ShowDialog();
}

void carrental::LoginForm::enterApp(String^ login, String^ password)
{
	MySqlCommand^ cmd = gcnew MySqlCommand("select * from wypozyczalnia.clients where login='" + login + "' and password='" + password + "';", connecter);
	MySqlDataReader^ reader;
	int id;

	try
	{
		connecter->Open();
		reader = cmd->ExecuteReader();
		int i = 0; // jezeli i zostanie zinkrementowane to oznacza, ze nastapilo poprawne logowanie, w przeciwnym wypadku podano zle dane
		while (reader->Read())
		{
			i++;
			id = reader->GetInt16(0);
		}
		connecter->Close();
		if (i > 0)
		{
			if (id != 1) //domyœlnie konto admina w bazie ma id=1, tu nastepuje logowanie klienta
			{
				LloginTextBox->Text = "Login";
				LpasswordTextBox->Text = "Has³o";
				LpasswordTextBox->UseSystemPasswordChar = false;
				this->Hide();
				ClientForm^ clientForm = gcnew ClientForm(id, this);
				clientForm->ShowDialog();
			}
			else
			{
				LloginTextBox->Text = "Login";
				LpasswordTextBox->Text = "Has³o";
				LpasswordTextBox->UseSystemPasswordChar = false;
				this->Hide();
				OwnerForm^ ownerForm = gcnew OwnerForm(this);
				ownerForm->ShowDialog();
			}
		}
		else
		{
			MessageBox::Show("Niepoprawny login lub has³o!");
		}
	}
	catch (Exception^ ex)
	{
		MessageBox::Show("B³¹d logowania: \n" + ex->Message);
	}
}

System::Void carrental::LoginForm::button1_Click(System::Object^  sender, System::EventArgs^  e)
{
	enterApp(LloginTextBox->Text, LpasswordTextBox->Text);
}

