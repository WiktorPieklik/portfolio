using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class GameUserInterface : MonoBehaviour
{
    [SerializeField]
    Text WaveCount;

    [SerializeField]
    Text MoneyCount;

    [SerializeField]
    Button ShieldUpgradeButton;

    [SerializeField]
    Button GunUpgradeButton;


    private void Awake()
    {
        FindObjectOfType<AsteroidWaveController>().OnWaveStarted += (waveNumber) =>
        {
            StartCoroutine(WaveCounterCoroutine(waveNumber));
        };

        FindObjectOfType<GameManager>().OnMoneyChanged += (money) =>
        {
            MoneyCount.text = "Money: " + money + "$";
        };

        var shield = FindObjectOfType<ShipShield>();
        ShieldUpgradeButton.GetComponent<UpgradeButton>().Configure(shield);

        var gun = FindObjectOfType<ShipGun>();
        GunUpgradeButton.GetComponent<UpgradeButton>().Configure(gun);
    }

    IEnumerator WaveCounterCoroutine(int waveNumber)
    {
        WaveCount.gameObject.SetActive(true);
        WaveCount.text = "Wave: " + waveNumber;
        yield return new WaitForSeconds(2f);
        WaveCount.gameObject.SetActive(false);
    }
}
