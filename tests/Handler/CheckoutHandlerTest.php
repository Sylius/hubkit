<?php

declare(strict_types=1);

/*
 * This file is part of the HubKit package.
 *
 * (c) Sebastiaan Stok <s.stok@rollerscapes.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace HubKit\Tests\Handler;

use HubKit\Cli\Handler\CheckoutHandler;
use HubKit\Service\CliProcess;
use HubKit\Service\Git;
use HubKit\Service\GitHub;
use PHPUnit\Framework\TestCase;
use Prophecy\Prophecy\ObjectProphecy;
use Webmozart\Console\Api\Args\Args;
use Webmozart\Console\Api\Args\Format\ArgsFormat;
use Webmozart\Console\IO\BufferedIO;

final class CheckoutHandlerTest extends TestCase
{
    use SymfonyStyleTrait;

    /** @var ObjectProphecy */
    private $process;
    /** @var ObjectProphecy */
    private $git;
    /** @var ObjectProphecy */
    private $github;

    /** @before */
    public function setUpCommandHandler(): void
    {
        $this->git = $this->prophesize(Git::class);
        $this->git->guardWorkingTreeReady()->willReturn(null);

        $this->github = $this->prophesize(GitHub::class);
        $this->github->getHostname()->willReturn('github.com');
        $this->github->getOrganization()->willReturn('park-manager');
        $this->github->getRepository()->willReturn('hubkit');

        $this->process = $this->prophesize(CliProcess::class);
    }

    /** @test */
    public function it_displays_error_if_no_pr_number_is_defined(): void
    {
        $io = new BufferedIO();
        $io->setInteractive(true);

        $style = $this->createStyle();

        $handler = new CheckoutHandler($style, $this->git->reveal(), $this->github->reveal(), $this->process->reveal());
        $handler->handle(new Args(ArgsFormat::build()->getFormat()));

        $this->assertOutputMatches('[ERROR] You must specify number of the pull-request for checkout.');
    }
}
