
#ifndef RegisterForm_h
#define RegisterForm_h
namespace carrental {

	using namespace System;
	using namespace System::ComponentModel;
	using namespace System::Collections;
	using namespace System::Windows::Forms;
	using namespace System::Data;
	using namespace System::Drawing;
	using namespace MySql::Data::MySqlClient;

	/// <summary>
	/// Podsumowanie informacji o RegisterForm
	/// </summary>
	public ref class RegisterForm : public System::Windows::Forms::Form
	{
	private:
		String ^ connectionString = L"datasource=localhost;port=3307;username=root;password=root";
		MySqlConnection ^ connecter = gcnew MySqlConnection(connectionString);

	public:
		RegisterForm(void);

	protected:
		~RegisterForm();
	private: System::Windows::Forms::Panel^  panel1;
	private: System::Windows::Forms::PictureBox^  pictureBox1;
	private: System::Windows::Forms::TextBox^  RnameTextBox;
	private: System::Windows::Forms::Label^  label1;
	private: System::Windows::Forms::Label^  label2;
	private: System::Windows::Forms::Label^  label3;
	private: System::Windows::Forms::Label^  label4;
	private: System::Windows::Forms::Label^  label5;
	private: System::Windows::Forms::Label^  label6;
	private: System::Windows::Forms::Label^  label7;
	private: System::Windows::Forms::TextBox^  RsurnameTextBox;
	private: System::Windows::Forms::TextBox^  RphoneNoTextBox;
	private: System::Windows::Forms::TextBox^  RidCardTextBox;
	private: System::Windows::Forms::TextBox^  RemailTextBox;
	private: System::Windows::Forms::TextBox^  RloginTextBox;
	private: System::Windows::Forms::TextBox^  RpasswordTextBox;
	private: System::Windows::Forms::Button^  RregisterButton;
	private: System::Windows::Forms::CheckBox^  RcheckBox;
	private: System::Windows::Forms::PictureBox^  pictureBox2;
	protected:

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
			System::ComponentModel::ComponentResourceManager^  resources = (gcnew System::ComponentModel::ComponentResourceManager(RegisterForm::typeid));
			this->panel1 = (gcnew System::Windows::Forms::Panel());
			this->pictureBox1 = (gcnew System::Windows::Forms::PictureBox());
			this->RnameTextBox = (gcnew System::Windows::Forms::TextBox());
			this->label1 = (gcnew System::Windows::Forms::Label());
			this->label2 = (gcnew System::Windows::Forms::Label());
			this->label3 = (gcnew System::Windows::Forms::Label());
			this->label4 = (gcnew System::Windows::Forms::Label());
			this->label5 = (gcnew System::Windows::Forms::Label());
			this->label6 = (gcnew System::Windows::Forms::Label());
			this->label7 = (gcnew System::Windows::Forms::Label());
			this->RsurnameTextBox = (gcnew System::Windows::Forms::TextBox());
			this->RphoneNoTextBox = (gcnew System::Windows::Forms::TextBox());
			this->RidCardTextBox = (gcnew System::Windows::Forms::TextBox());
			this->RemailTextBox = (gcnew System::Windows::Forms::TextBox());
			this->RloginTextBox = (gcnew System::Windows::Forms::TextBox());
			this->RpasswordTextBox = (gcnew System::Windows::Forms::TextBox());
			this->RregisterButton = (gcnew System::Windows::Forms::Button());
			this->RcheckBox = (gcnew System::Windows::Forms::CheckBox());
			this->pictureBox2 = (gcnew System::Windows::Forms::PictureBox());
			this->panel1->SuspendLayout();
			(cli::safe_cast<System::ComponentModel::ISupportInitialize^>(this->pictureBox1))->BeginInit();
			(cli::safe_cast<System::ComponentModel::ISupportInitialize^>(this->pictureBox2))->BeginInit();
			this->SuspendLayout();
			// 
			// panel1
			// 
			this->panel1->BackColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(255)), static_cast<System::Int32>(static_cast<System::Byte>(87)),
				static_cast<System::Int32>(static_cast<System::Byte>(34)));
			this->panel1->Controls->Add(this->pictureBox1);
			this->panel1->Dock = System::Windows::Forms::DockStyle::Left;
			this->panel1->Location = System::Drawing::Point(0, 0);
			this->panel1->Name = L"panel1";
			this->panel1->Size = System::Drawing::Size(285, 533);
			this->panel1->TabIndex = 0;
			// 
			// pictureBox1
			// 
			this->pictureBox1->Image = (cli::safe_cast<System::Drawing::Image^>(resources->GetObject(L"pictureBox1.Image")));
			this->pictureBox1->Location = System::Drawing::Point(7, 134);
			this->pictureBox1->Name = L"pictureBox1";
			this->pictureBox1->Size = System::Drawing::Size(270, 263);
			this->pictureBox1->SizeMode = System::Windows::Forms::PictureBoxSizeMode::Zoom;
			this->pictureBox1->TabIndex = 0;
			this->pictureBox1->TabStop = false;
			// 
			// RnameTextBox
			// 
			this->RnameTextBox->BorderStyle = System::Windows::Forms::BorderStyle::None;
			this->RnameTextBox->Location = System::Drawing::Point(642, 52);
			this->RnameTextBox->MaxLength = 45;
			this->RnameTextBox->Name = L"RnameTextBox";
			this->RnameTextBox->Size = System::Drawing::Size(211, 20);
			this->RnameTextBox->TabIndex = 1;
			// 
			// label1
			// 
			this->label1->AutoSize = true;
			this->label1->Location = System::Drawing::Point(395, 51);
			this->label1->Name = L"label1";
			this->label1->Size = System::Drawing::Size(43, 21);
			this->label1->TabIndex = 2;
			this->label1->Text = L"Imiê";
			// 
			// label2
			// 
			this->label2->AutoSize = true;
			this->label2->Location = System::Drawing::Point(395, 102);
			this->label2->Name = L"label2";
			this->label2->Size = System::Drawing::Size(81, 21);
			this->label2->TabIndex = 3;
			this->label2->Text = L"Nazwisko";
			// 
			// label3
			// 
			this->label3->AutoSize = true;
			this->label3->Location = System::Drawing::Point(395, 153);
			this->label3->Name = L"label3";
			this->label3->Size = System::Drawing::Size(96, 21);
			this->label3->TabIndex = 4;
			this->label3->Text = L"Nr telefonu";
			// 
			// label4
			// 
			this->label4->AutoSize = true;
			this->label4->Location = System::Drawing::Point(395, 204);
			this->label4->Name = L"label4";
			this->label4->Size = System::Drawing::Size(185, 21);
			this->label4->TabIndex = 5;
			this->label4->Text = L"Nr dowodu osobistego";
			// 
			// label5
			// 
			this->label5->AutoSize = true;
			this->label5->Location = System::Drawing::Point(395, 255);
			this->label5->Name = L"label5";
			this->label5->Size = System::Drawing::Size(101, 21);
			this->label5->TabIndex = 6;
			this->label5->Text = L"Adres email";
			// 
			// label6
			// 
			this->label6->AutoSize = true;
			this->label6->Location = System::Drawing::Point(395, 306);
			this->label6->Name = L"label6";
			this->label6->Size = System::Drawing::Size(51, 21);
			this->label6->TabIndex = 7;
			this->label6->Text = L"Login";
			// 
			// label7
			// 
			this->label7->AutoSize = true;
			this->label7->Location = System::Drawing::Point(395, 357);
			this->label7->Name = L"label7";
			this->label7->Size = System::Drawing::Size(54, 21);
			this->label7->TabIndex = 8;
			this->label7->Text = L"Has³o";
			// 
			// RsurnameTextBox
			// 
			this->RsurnameTextBox->BorderStyle = System::Windows::Forms::BorderStyle::None;
			this->RsurnameTextBox->Location = System::Drawing::Point(642, 103);
			this->RsurnameTextBox->MaxLength = 45;
			this->RsurnameTextBox->Name = L"RsurnameTextBox";
			this->RsurnameTextBox->Size = System::Drawing::Size(211, 20);
			this->RsurnameTextBox->TabIndex = 9;
			// 
			// RphoneNoTextBox
			// 
			this->RphoneNoTextBox->BorderStyle = System::Windows::Forms::BorderStyle::None;
			this->RphoneNoTextBox->Location = System::Drawing::Point(642, 154);
			this->RphoneNoTextBox->MaxLength = 45;
			this->RphoneNoTextBox->Name = L"RphoneNoTextBox";
			this->RphoneNoTextBox->Size = System::Drawing::Size(211, 20);
			this->RphoneNoTextBox->TabIndex = 10;
			// 
			// RidCardTextBox
			// 
			this->RidCardTextBox->BorderStyle = System::Windows::Forms::BorderStyle::None;
			this->RidCardTextBox->Location = System::Drawing::Point(642, 205);
			this->RidCardTextBox->MaxLength = 45;
			this->RidCardTextBox->Name = L"RidCardTextBox";
			this->RidCardTextBox->Size = System::Drawing::Size(211, 20);
			this->RidCardTextBox->TabIndex = 11;
			// 
			// RemailTextBox
			// 
			this->RemailTextBox->BorderStyle = System::Windows::Forms::BorderStyle::None;
			this->RemailTextBox->Location = System::Drawing::Point(642, 256);
			this->RemailTextBox->MaxLength = 45;
			this->RemailTextBox->Name = L"RemailTextBox";
			this->RemailTextBox->Size = System::Drawing::Size(211, 20);
			this->RemailTextBox->TabIndex = 12;
			// 
			// RloginTextBox
			// 
			this->RloginTextBox->BorderStyle = System::Windows::Forms::BorderStyle::None;
			this->RloginTextBox->Location = System::Drawing::Point(642, 307);
			this->RloginTextBox->MaxLength = 45;
			this->RloginTextBox->Name = L"RloginTextBox";
			this->RloginTextBox->Size = System::Drawing::Size(211, 20);
			this->RloginTextBox->TabIndex = 13;
			this->RloginTextBox->Enter += gcnew System::EventHandler(this, &RegisterForm::RloginTextBox_Enter);
			// 
			// RpasswordTextBox
			// 
			this->RpasswordTextBox->BorderStyle = System::Windows::Forms::BorderStyle::None;
			this->RpasswordTextBox->Location = System::Drawing::Point(642, 357);
			this->RpasswordTextBox->MaxLength = 45;
			this->RpasswordTextBox->Name = L"RpasswordTextBox";
			this->RpasswordTextBox->Size = System::Drawing::Size(211, 20);
			this->RpasswordTextBox->TabIndex = 14;
			this->RpasswordTextBox->UseSystemPasswordChar = true;
			// 
			// RregisterButton
			// 
			this->RregisterButton->BackColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(255)), static_cast<System::Int32>(static_cast<System::Byte>(87)),
				static_cast<System::Int32>(static_cast<System::Byte>(34)));
			this->RregisterButton->FlatAppearance->BorderSize = 0;
			this->RregisterButton->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->RregisterButton->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->RregisterButton->Location = System::Drawing::Point(399, 454);
			this->RregisterButton->Name = L"RregisterButton";
			this->RregisterButton->Size = System::Drawing::Size(454, 30);
			this->RregisterButton->TabIndex = 15;
			this->RregisterButton->Text = L"Zarejestruj siê";
			this->RregisterButton->UseVisualStyleBackColor = false;
			this->RregisterButton->Click += gcnew System::EventHandler(this, &RegisterForm::RregisterButton_Click);
			// 
			// RcheckBox
			// 
			this->RcheckBox->AutoSize = true;
			this->RcheckBox->Location = System::Drawing::Point(739, 383);
			this->RcheckBox->Name = L"RcheckBox";
			this->RcheckBox->Size = System::Drawing::Size(121, 25);
			this->RcheckBox->TabIndex = 16;
			this->RcheckBox->Text = L"Poka¿ has³o";
			this->RcheckBox->UseVisualStyleBackColor = true;
			this->RcheckBox->CheckedChanged += gcnew System::EventHandler(this, &RegisterForm::RcheckBox_CheckedChanged);
			// 
			// pictureBox2
			// 
			this->pictureBox2->BackColor = System::Drawing::SystemColors::Menu;
			this->pictureBox2->Image = (cli::safe_cast<System::Drawing::Image^>(resources->GetObject(L"pictureBox2.Image")));
			this->pictureBox2->Location = System::Drawing::Point(900, -4);
			this->pictureBox2->Name = L"pictureBox2";
			this->pictureBox2->Size = System::Drawing::Size(64, 64);
			this->pictureBox2->SizeMode = System::Windows::Forms::PictureBoxSizeMode::AutoSize;
			this->pictureBox2->TabIndex = 17;
			this->pictureBox2->TabStop = false;
			this->pictureBox2->Click += gcnew System::EventHandler(this, &RegisterForm::pictureBox2_Click);
			// 
			// RegisterForm
			// 
			this->AutoScaleMode = System::Windows::Forms::AutoScaleMode::None;
			this->ClientSize = System::Drawing::Size(974, 533);
			this->Controls->Add(this->pictureBox2);
			this->Controls->Add(this->RcheckBox);
			this->Controls->Add(this->RregisterButton);
			this->Controls->Add(this->RpasswordTextBox);
			this->Controls->Add(this->RloginTextBox);
			this->Controls->Add(this->RemailTextBox);
			this->Controls->Add(this->RidCardTextBox);
			this->Controls->Add(this->RphoneNoTextBox);
			this->Controls->Add(this->RsurnameTextBox);
			this->Controls->Add(this->label7);
			this->Controls->Add(this->label6);
			this->Controls->Add(this->label5);
			this->Controls->Add(this->label4);
			this->Controls->Add(this->label3);
			this->Controls->Add(this->label2);
			this->Controls->Add(this->label1);
			this->Controls->Add(this->RnameTextBox);
			this->Controls->Add(this->panel1);
			this->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Regular, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(238)));
			this->FormBorderStyle = System::Windows::Forms::FormBorderStyle::None;
			this->Icon = (cli::safe_cast<System::Drawing::Icon^>(resources->GetObject(L"$this.Icon")));
			this->Name = L"RegisterForm";
			this->StartPosition = System::Windows::Forms::FormStartPosition::CenterScreen;
			this->Text = L"RegisterForm";
			this->panel1->ResumeLayout(false);
			(cli::safe_cast<System::ComponentModel::ISupportInitialize^>(this->pictureBox1))->EndInit();
			(cli::safe_cast<System::ComponentModel::ISupportInitialize^>(this->pictureBox2))->EndInit();
			this->ResumeLayout(false);
			this->PerformLayout();

		}
//#pragma endregion
	private: void pictureBox2_Click(System::Object^  sender, System::EventArgs^  e);
	private: System::Void RcheckBox_CheckedChanged(System::Object^  sender, System::EventArgs^  e);
	public: void Register();
	private: System::Void RregisterButton_Click(System::Object^  sender, System::EventArgs^  e);
	private: System::Void RloginTextBox_Enter(System::Object^  sender, System::EventArgs^  e);
};
}
#endif // !RegisterForm_h
