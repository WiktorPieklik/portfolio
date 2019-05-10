#ifndef Client_h
#define Client_h

using namespace System;
using namespace System::Windows::Forms;
using namespace MySql::Data::MySqlClient;

ref class Client
{
public:

	Client(int id, String^ name, String^ surname, String^ phoneNo, String^ identityCard, String^ login, String^ password, String^ email);
	int getClientId();
	String^ getClientName();
	String^ getClientSurname();
	String^ getClientPhoneNo();
	String^ getClientIdentityCard();
	String^ getClientLogin();
	String^ getClientPassword();
	String^ getClientEmail();

private:
	int clientId;
	String^ name;
	String^ surname;
	String^ phoneNo;
	String^ identityCard;
	String^ login;
	String^ password;
	String^ email;
	//Order clientOrders[];

};
#endif 