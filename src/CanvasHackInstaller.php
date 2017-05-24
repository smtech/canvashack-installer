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
		$name = $package->getPrettyName();
		if ('canvashack/plugin-' == substr($package->getPrettyName(), 0, 18)) {
            $name = substr($name, 18);
		} else {
            $name = str_replace('/', '_', $name);
        }

		return "hacks/$name";
	}

	/**
	 * {@inheritDoc}
	 **/
	public function supports($packageType) {
		return 'canvashack-plugin' === $packageType;
	}
}

?>
