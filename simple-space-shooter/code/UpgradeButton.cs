using System;
using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class UpgradeButton : MonoBehaviour
{
    public IUpgradable Upgradable;
    GameManager gameManager;
    private Button Button;

    [SerializeField]
    string Text;

    // Start is called before the first frame update
    void Awake()
    {
        gameManager = FindObjectOfType<GameManager>();
        Button = GetComponent<Button>();
        var waveController = FindObjectOfType<AsteroidWaveController>();

        waveController.OnWaveEnded += (waveNumber) =>
        {
            gameObject.SetActive(true);
        };

        waveController.OnWaveStarted += (waveNumber) =>
        {
            gameObject.SetActive(false);
        };

        gameManager.OnMoneyChanged += (money) =>
        {
            RefreshButton();
        };
    }

    public void Configure(IUpgradable upgradable)
    {
        Upgradable = upgradable;

        Button.onClick.AddListener(Upgrade);
    }

    private void Upgrade()
    {
        if (!CanUpgrade())
            return;

        Upgradable.Upgrade();
        gameManager.Money -= Upgradable.UpgradeCost;
        RefreshButton();
    }

    private void RefreshButton()
    {
        var canUpgrade = CanUpgrade();
        Button.enabled = canUpgrade;
        Button.GetComponent<Image>().color = canUpgrade ? Color.white : Color.gray;

        var textComponent = Button.GetComponentInChildren<Text>();

        textComponent.text = string.Format("{0} ({1})", Text, Upgradable.CurrentLevel.ToString());

        if (!IsMaximumLevel())
            textComponent.text += "\n" + Upgradable.UpgradeCost + "$";
    }

    private bool CanUpgrade()
    {
        return !IsMaximumLevel() && IsAffordable();
    }

    private bool IsMaximumLevel()
    {
        return Upgradable.CurrentLevel >= Upgradable.MaxLevel;
    }

    private bool IsAffordable()
    {
        return Upgradable.UpgradeCost <= gameManager.Money;
    }
}
