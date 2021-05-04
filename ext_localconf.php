<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Showcase',
            'List',
            [
                \SIMONKOEHLER\Showcase\Controller\ProjectController::class => 'list,show',
            ],
            [
                \SIMONKOEHLER\Showcase\Controller\ProjectController::class => 'list,show',
            ]
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:showcase/Configuration/TsConfig/Page/Mod/Wizards/NewContentElement.tsconfig">'
        );

        $icons = [
            'showcase-list' => 'EXT:showcase/ext_icon.svg',
        ];

        $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
        foreach ($icons as $identifier => $path) {
            $iconRegistry->registerIcon(
                $identifier,
                \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
                ['source' => $path]
            );
        }

    }
);
