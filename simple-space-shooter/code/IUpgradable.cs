using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

public interface IUpgradable
{
    int MaxLevel { get; }
    int CurrentLevel { get; }

    int UpgradeCost { get; }
    void Upgrade();
}
