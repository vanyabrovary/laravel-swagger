<?php

namespace Vanyabrovary\LaravelSwagger\Parameters\Concerns;

trait ParserDoc
{
    protected function parserDocBlockGroup($docBlock)
    {
        try {
            foreach ($this->docParser->create($docBlock)->getTags() as $tag) {
                if ($tag->getName() === 'group') {
                    $routeGroupParts = explode("\n", trim( $tag->getDescription()->render() ) );
                    //fwrite(STDOUT, "\n\nTAG_NAME\n\n" . var_dump($routeGroupParts) );
                    return [
                        ($routeGroupParts[0] ?? 'Ather'), 
                        ($routeGroupParts[2] ?? ''), 
                        ($routeGroupParts[4] ?? ''), 
                    ];

                }
            }
        } catch (\Exception $e) {
            return ['Ather','',''];
        }
    }
}
