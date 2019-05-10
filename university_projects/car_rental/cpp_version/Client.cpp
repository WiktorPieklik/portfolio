#include "Client.h"

Client::Client(int id, String^ name, String^ surname, String^ phoneNo, String^ identityCard, String^ login, String^ password, String^ email) : clientId(id), name(name), surname(surname), phoneNo(phoneNo), identityCard(identityCard), login(login), password(password), email(email)
{

}


int Client::getClientId()
{
	return this->clientId;
}


String^ Client::getClientName()
{
	return this->name;
}


String^ Client::getClientSurname()
{
	return this->surname;
}


String^ Client::getClientPhoneNo()
{
	return this->phoneNo;
}


String^ Client::getClientIdentityCard()
{
	return this->identityCard;
}


String^ Client::getClientLogin()
{
	return this->login;
}


String^ Client::getClientPassword()
{
	return this->password;
}


String^ Client::getClientEmail()
{
	return this->email;
}


