<?php

/** CanvasHackInstaller */

namespace smtech\Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

/**
 * A custom installer for CanvasHack plugins
 *
 * @author Seth Battis <SethBattis@stmarksschool.org>
 **/
class CanvasHackInstaller extends LibraryInstaller {
	
	/**
	 * {@inheritDoc}
	 **/
	public function getInstallPath(PackageInterface $package) {
		$prefix = substr($package->getPrettyName(), 0, 18);
		if ('canvashack/plugin-' !== $prefix) {
			throw new \InvalidArgumentException(
				'Unable to install plugin, CanvasHack plugins should always start their package name with "canvashack/plugin-"'
			);
		}

		return 'hacks/' . substr($package->getPrettyName(), 18);
	}

	/**
	 * {@inheritDoc}
	 **/
	public function supports($packageType) {
		return 'canvashack-plugin' === $packageType;
	}
}

?>
