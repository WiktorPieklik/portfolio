#ifndef LoginForm_h
#define LoginForm_h

#include "RegisterForm.h";
#include "ClientForm.h";
#include "OwnerForm.h";
namespace carrental {

	using namespace System;
	using namespace System::ComponentModel;
	using namespace System::Collections;
	using namespace System::Windows::Forms;
	using namespace System::Data;
	using namespace System::Drawing;

	/// <summary>
	/// Podsumowanie informacji o LoginForm
	/// </summary>
	public ref class LoginForm : public System::Windows::Forms::Form
	{
	public:
		LoginForm(void);
	private:
		String ^ connectionString = L"datasource=localhost;port=3307;username=root;password=root";
		MySqlConnection^ connecter = gcnew MySqlConnection(connectionString);

	protected:
		~LoginForm();
	private: System::Windows::Forms::Panel^  panel1;
	protected:
	private: System::Windows::Forms::PictureBox^  pictureBox1;
	private: System::Windows::Forms::TextBox^  LloginTextBox;
	private: System::Windows::Forms::TextBox^  LpasswordTextBox;


	private: System::Windows::Forms::Button^  button1;
	private: System::Windows::Forms::Button^  button2;
	private: System::Windows::Forms::Button^  LexitButton;


	private:
		/// <summary>
		/// Wymagana zmienna projektanta.
		/// </summary>
		System::ComponentModel::Container ^components;

#pragma region Windows Form Designer generated code
		/// <summary>
		/// Wymagana metoda obs³ugi projektanta — nie nale¿y modyfikowaæ 
		/// zawartoœæ tej metody z edytorem kodu.
		/// </summary>
		void InitializeComponent(void)
		{
			System::ComponentModel::ComponentResourceManager^  resources = (gcnew System::ComponentModel::ComponentResourceManager(LoginForm::typeid));
			this->panel1 = (gcnew System::Windows::Forms::Panel());
			this->pictureBox1 = (gcnew System::Windows::Forms::PictureBox());
			this->LloginTextBox = (gcnew System::Windows::Forms::TextBox());
			this->LpasswordTextBox = (gcnew System::Windows::Forms::TextBox());
			this->button1 = (gcnew System::Windows::Forms::Button());
			this->button2 = (gcnew System::Windows::Forms::Button());
			this->LexitButton = (gcnew System::Windows::Forms::Button());
			this->panel1->SuspendLayout();
			(cli::safe_cast<System::ComponentModel::ISupportInitialize^>(this->pictureBox1))->BeginInit();
			this->SuspendLayout();
			// 
			// panel1
			// 
			this->panel1->BackColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(21)), static_cast<System::Int32>(static_cast<System::Byte>(101)),
				static_cast<System::Int32>(static_cast<System::Byte>(192)));
			this->panel1->Controls->Add(this->pictureBox1);
			this->panel1->Dock = System::Windows::Forms::DockStyle::Left;
			this->panel1->Location = System::Drawing::Point(0, 0);
			this->panel1->Name = L"panel1";
			this->panel1->Size = System::Drawing::Size(339, 423);
			this->panel1->TabIndex = 0;
			// 
			// pictureBox1
			// 
			this->pictureBox1->Image = (cli::safe_cast<System::Drawing::Image^>(resources->GetObject(L"pictureBox1.Image")));
			this->pictureBox1->Location = System::Drawing::Point(7, 62);
			this->pictureBox1->Name = L"pictureBox1";
			this->pictureBox1->Size = System::Drawing::Size(324, 298);
			this->pictureBox1->SizeMode = System::Windows::Forms::PictureBoxSizeMode::Zoom;
			this->pictureBox1->TabIndex = 0;
			this->pictureBox1->TabStop = false;
			// 
			// LloginTextBox
			// 
			this->LloginTextBox->BorderStyle = System::Windows::Forms::BorderStyle::FixedSingle;
			this->LloginTextBox->ForeColor = System::Drawing::Color::Black;
			this->LloginTextBox->Location = System::Drawing::Point(419, 112);
			this->LloginTextBox->MaxLength = 45;
			this->LloginTextBox->Name = L"LloginTextBox";
			this->LloginTextBox->Size = System::Drawing::Size(395, 27);
			this->LloginTextBox->TabIndex = 1;
			this->LloginTextBox->Text = L"Login";
			this->LloginTextBox->TextAlign = System::Windows::Forms::HorizontalAlignment::Center;
			this->LloginTextBox->Enter += gcnew System::EventHandler(this, &LoginForm::LloginTextBox_Enter);
			this->LloginTextBox->Leave += gcnew System::EventHandler(this, &LoginForm::LloginTextBox_Leave);
			// 
			// LpasswordTextBox
			// 
			this->LpasswordTextBox->BorderStyle = System::Windows::Forms::BorderStyle::FixedSingle;
			this->LpasswordTextBox->ForeColor = System::Drawing::Color::Black;
			this->LpasswordTextBox->Location = System::Drawing::Point(419, 156);
			this->LpasswordTextBox->MaxLength = 45;
			this->LpasswordTextBox->Name = L"LpasswordTextBox";
			this->LpasswordTextBox->Size = System::Drawing::Size(395, 27);
			this->LpasswordTextBox->TabIndex = 2;
			this->LpasswordTextBox->Text = L"Has³o";
			this->LpasswordTextBox->TextAlign = System::Windows::Forms::HorizontalAlignment::Center;
			this->LpasswordTextBox->Enter += gcnew System::EventHandler(this, &LoginForm::LpasswordTextBox_Enter);
			this->LpasswordTextBox->Leave += gcnew System::EventHandler(this, &LoginForm::LpasswordTextBox_Leave);
			// 
			// button1
			// 
			this->button1->BackColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(144)), static_cast<System::Int32>(static_cast<System::Byte>(202)),
				static_cast<System::Int32>(static_cast<System::Byte>(249)));
			this->button1->FlatAppearance->BorderSize = 0;
			this->button1->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->button1->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->button1->Location = System::Drawing::Point(419, 286);
			this->button1->Name = L"button1";
			this->button1->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->button1->Size = System::Drawing::Size(395, 34);
			this->button1->TabIndex = 5;
			this->button1->Text = L"Zaloguj";
			this->button1->UseVisualStyleBackColor = false;
			this->button1->Click += gcnew System::EventHandler(this, &LoginForm::button1_Click);
			// 
			// button2
			// 
			this->button2->BackColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(255)), static_cast<System::Int32>(static_cast<System::Byte>(87)),
				static_cast<System::Int32>(static_cast<System::Byte>(34)));
			this->button2->FlatAppearance->BorderSize = 0;
			this->button2->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->button2->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->button2->Location = System::Drawing::Point(419, 326);
			this->button2->Name = L"button2";
			this->button2->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->button2->Size = System::Drawing::Size(395, 34);
			this->button2->TabIndex = 6;
			this->button2->Text = L"Zarejestruj siê";
			this->button2->UseVisualStyleBackColor = false;
			this->button2->Click += gcnew System::EventHandler(this, &LoginForm::button2_Click);
			// 
			// LexitButton
			// 
			this->LexitButton->FlatAppearance->BorderSize = 0;
			this->LexitButton->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->LexitButton->Image = (cli::safe_cast<System::Drawing::Image^>(resources->GetObject(L"LexitButton.Image")));
			this->LexitButton->Location = System::Drawing::Point(784, 4);
			this->LexitButton->Name = L"LexitButton";
			this->LexitButton->Size = System::Drawing::Size(75, 48);
			this->LexitButton->TabIndex = 7;
			this->LexitButton->UseVisualStyleBackColor = true;
			this->LexitButton->Click += gcnew System::EventHandler(this, &LoginForm::LexitButton_Click);
			// 
			// LoginForm
			// 
			this->AutoScaleMode = System::Windows::Forms::AutoScaleMode::None;
			this->BackColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(33)), static_cast<System::Int32>(static_cast<System::Byte>(150)),
				static_cast<System::Int32>(static_cast<System::Byte>(243)));
			this->ClientSize = System::Drawing::Size(864, 423);
			this->Controls->Add(this->LexitButton);
			this->Controls->Add(this->button2);
			this->Controls->Add(this->button1);
			this->Controls->Add(this->LpasswordTextBox);
			this->Controls->Add(this->LloginTextBox);
			this->Controls->Add(this->panel1);
			this->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Regular, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->ForeColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(26)), static_cast<System::Int32>(static_cast<System::Byte>(35)),
				static_cast<System::Int32>(static_cast<System::Byte>(126)));
			this->FormBorderStyle = System::Windows::Forms::FormBorderStyle::None;
			this->Icon = (cli::safe_cast<System::Drawing::Icon^>(resources->GetObject(L"$this.Icon")));
			this->Name = L"LoginForm";
			this->StartPosition = System::Windows::Forms::FormStartPosition::CenterScreen;
			this->Text = L"LoginForm";
			this->panel1->ResumeLayout(false);
			(cli::safe_cast<System::ComponentModel::ISupportInitialize^>(this->pictureBox1))->EndInit();
			this->ResumeLayout(false);
			this->PerformLayout();

		}
 
	private: System::Void LexitButton_Click(System::Object^  sender, System::EventArgs^  e);
	private: System::Void LloginTextBox_Enter(System::Object^  sender, System::EventArgs^  e);
	private: System::Void LloginTextBox_Leave(System::Object^  sender, System::EventArgs^  e);
	private: System::Void LpasswordTextBox_Enter(System::Object^  sender, System::EventArgs^  e);
	private: System::Void LpasswordTextBox_Leave(System::Object^  sender, System::EventArgs^  e);
	private: System::Void button2_Click(System::Object^  sender, System::EventArgs^  e);
	public: void enterApp(String^ login, String^ password);
	private: System::Void button1_Click(System::Object^  sender, System::EventArgs^  e);
};
}
#endif
