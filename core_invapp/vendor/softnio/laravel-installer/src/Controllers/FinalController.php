<?php

namespace Nio\LaravelInstaller\Controllers;

use Illuminate\Routing\Controller;
use Nio\LaravelInstaller\Helpers\EnvironmentManager;
use Nio\LaravelInstaller\Helpers\FinalInstallManager;
use Nio\LaravelInstaller\Helpers\InstalledFileManager;
use Nio\LaravelInstaller\Events\LaravelInstallerFinished;

class FinalController extends Controller
{
    /**
     * Update installed file and display finished view.
     *
     * @param \Nio\LaravelInstaller\Helpers\InstalledFileManager $fileManager
     * @param \Nio\LaravelInstaller\Helpers\FinalInstallManager $finalInstall
     * @param \Nio\LaravelInstaller\Helpers\EnvironmentManager $environment
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function finish(InstalledFileManager $fileManager, FinalInstallManager $finalInstall, EnvironmentManager $environment)
    {
        $finalMessages = $finalInstall->runFinal();
        $finalStatusMessage = $fileManager->update();
        $finalEnvFile = $environment->getEnvContent();

        event(new LaravelInstallerFinished);

        return view('vendor.installer.finished', compact('finalMessages', 'finalStatusMessage', 'finalEnvFile'));
    }
}
