<?php

/** CanvasHackInstallerPlugin */

namespace smtech\Composer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

/**
 * A Composer plugin to trigger custom installation of CanvasHack plugins
 *
 * @author Seth Battis <SethBattis@stmarksschool.org>
 **/
class CanvasHackInstallerPlugin implements PluginInterface {
	
	/**
	 * {@inheritDoc}
	 **/
	public function activate(Composer $composer, IOInterface $io) {
		$installer = new CanvasHackInstaller($io, $composer);
		$composer->getInstallationManager()->addInstaller($installer);
	}
}

?>
