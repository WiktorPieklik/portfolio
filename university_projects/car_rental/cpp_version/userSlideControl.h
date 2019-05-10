#ifndef userSlideControl_h
#define userSlideControl_h

using namespace System;
using namespace System::ComponentModel;
using namespace System::Collections;
using namespace System::Windows::Forms;
using namespace System::Data;
using namespace System::Drawing;


namespace carrental {

	/// <summary>
	/// Podsumowanie informacji o userSlideControl
	/// </summary>
	public ref class userSlideControl : public System::Windows::Forms::UserControl
	{
	public:
		userSlideControl();

	protected:
		~userSlideControl();

	public: System::Windows::Forms::Label^  nameLbl;
	public: System::Windows::Forms::Label^  surnameLbl;
	public: System::Windows::Forms::Label^  phoneNoLbl;
	public: System::Windows::Forms::Label^  emailLbl;
	public: System::Windows::Forms::Label^  idCardLbl;
	private:

	private:


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
			this->nameLbl = (gcnew System::Windows::Forms::Label());
			this->surnameLbl = (gcnew System::Windows::Forms::Label());
			this->phoneNoLbl = (gcnew System::Windows::Forms::Label());
			this->emailLbl = (gcnew System::Windows::Forms::Label());
			this->idCardLbl = (gcnew System::Windows::Forms::Label());
			this->SuspendLayout();
			// 
			// nameLbl
			// 
			this->nameLbl->AutoSize = true;
			this->nameLbl->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12.75F, static_cast<System::Drawing::FontStyle>((System::Drawing::FontStyle::Bold | System::Drawing::FontStyle::Italic)),
				System::Drawing::GraphicsUnit::Point, static_cast<System::Byte>(238)));
			this->nameLbl->ForeColor = System::Drawing::Color::White;
			this->nameLbl->Location = System::Drawing::Point(3, 11);
			this->nameLbl->Name = L"nameLbl";
			this->nameLbl->Size = System::Drawing::Size(45, 21);
			this->nameLbl->TabIndex = 1;
			this->nameLbl->Text = L"imie";
			// 
			// surnameLbl
			// 
			this->surnameLbl->Anchor = System::Windows::Forms::AnchorStyles::Left;
			this->surnameLbl->AutoSize = true;
			this->surnameLbl->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->surnameLbl->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12.75F, static_cast<System::Drawing::FontStyle>((System::Drawing::FontStyle::Bold | System::Drawing::FontStyle::Italic)),
				System::Drawing::GraphicsUnit::Point, static_cast<System::Byte>(238)));
			this->surnameLbl->ForeColor = System::Drawing::Color::White;
			this->surnameLbl->Location = System::Drawing::Point(128, 11);
			this->surnameLbl->Name = L"surnameLbl";
			this->surnameLbl->Size = System::Drawing::Size(85, 21);
			this->surnameLbl->TabIndex = 2;
			this->surnameLbl->Text = L"nazwisko";
			// 
			// phoneNoLbl
			// 
			this->phoneNoLbl->Anchor = static_cast<System::Windows::Forms::AnchorStyles>((System::Windows::Forms::AnchorStyles::Bottom | System::Windows::Forms::AnchorStyles::Right));
			this->phoneNoLbl->AutoSize = true;
			this->phoneNoLbl->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->phoneNoLbl->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12.75F, static_cast<System::Drawing::FontStyle>((System::Drawing::FontStyle::Bold | System::Drawing::FontStyle::Italic)),
				System::Drawing::GraphicsUnit::Point, static_cast<System::Byte>(238)));
			this->phoneNoLbl->ForeColor = System::Drawing::Color::White;
			this->phoneNoLbl->Location = System::Drawing::Point(3, 52);
			this->phoneNoLbl->Name = L"phoneNoLbl";
			this->phoneNoLbl->Size = System::Drawing::Size(67, 21);
			this->phoneNoLbl->TabIndex = 3;
			this->phoneNoLbl->Text = L"telefon";
			// 
			// emailLbl
			// 
			this->emailLbl->Anchor = System::Windows::Forms::AnchorStyles::Left;
			this->emailLbl->AutoSize = true;
			this->emailLbl->FlatStyle = System::Windows::Forms::FlatStyle::Flat;
			this->emailLbl->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12.75F, static_cast<System::Drawing::FontStyle>((System::Drawing::FontStyle::Bold | System::Drawing::FontStyle::Italic)),
				System::Drawing::GraphicsUnit::Point, static_cast<System::Byte>(238)));
			this->emailLbl->ForeColor = System::Drawing::Color::White;
			this->emailLbl->Location = System::Drawing::Point(3, 94);
			this->emailLbl->Name = L"emailLbl";
			this->emailLbl->Size = System::Drawing::Size(45, 21);
			this->emailLbl->TabIndex = 5;
			this->emailLbl->Text = L"mail";
			// 
			// idCardLbl
			// 
			this->idCardLbl->Anchor = System::Windows::Forms::AnchorStyles::Left;
			this->idCardLbl->AutoSize = true;
			this->idCardLbl->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12.75F, static_cast<System::Drawing::FontStyle>((System::Drawing::FontStyle::Bold | System::Drawing::FontStyle::Italic)),
				System::Drawing::GraphicsUnit::Point, static_cast<System::Byte>(238)));
			this->idCardLbl->ForeColor = System::Drawing::Color::White;
			this->idCardLbl->Location = System::Drawing::Point(128, 52);
			this->idCardLbl->Name = L"idCardLbl";
			this->idCardLbl->Size = System::Drawing::Size(66, 21);
			this->idCardLbl->TabIndex = 4;
			this->idCardLbl->Text = L"dowód";
			// 
			// userSlideControl
			// 
			this->AutoScaleMode = System::Windows::Forms::AutoScaleMode::None;
			this->BackColor = System::Drawing::Color::FromArgb(static_cast<System::Int32>(static_cast<System::Byte>(33)), static_cast<System::Int32>(static_cast<System::Byte>(150)),
				static_cast<System::Int32>(static_cast<System::Byte>(243)));
			this->Controls->Add(this->emailLbl);
			this->Controls->Add(this->idCardLbl);
			this->Controls->Add(this->phoneNoLbl);
			this->Controls->Add(this->surnameLbl);
			this->Controls->Add(this->nameLbl);
			this->Font = (gcnew System::Drawing::Font(L"Century Gothic", 12, System::Drawing::FontStyle::Regular, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(0)));
			this->Name = L"userSlideControl";
			this->Size = System::Drawing::Size(359, 125);
			this->ResumeLayout(false);
			this->PerformLayout();

		}	
};
}
#endif // !userSlideControl_h

