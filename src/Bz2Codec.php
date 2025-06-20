<?php

namespace Codecs;

/**
 * A codec for compressing and decompressing strings with bzip2.
 * 
 * @api
 * @since 1.0.0
 * @version 1.0.0
 * @package bz2-codec
 * @author Ali M. Kamel <ali.kamel.dev@gmail.com>
 */
class Bz2Codec implements ICodec {

    /**
     * Creates a new instance of the Bz2Codec class.
     * 
     * @api
     * @since 1.0.0
     * @version 1.0.0
     * 
     * @param int $blockSize Specifies the blocksize used during compression and should be a number from 1 to 9 with 9 giving the best compression, but using more resources to do so. 
     * @param int $workFactor Controls how the compression phase behaves when presented with worst case, highly repetitive, input data. The value can be between 0 and 250 with 0 being a special case. 
     * @param bool $useLessMemory If true, an alternative decompression algorithm will be used which uses less memory (the maximum memory requirement drops to around 2300K) but works at roughly half the speed. 
     */
    public function __construct(

        public readonly int  $blockSize     = 4,
        public readonly int  $workFactor    = 0,
        public readonly bool $useLessMemory = false
    ) {}

    /**
     * Encodes a value into a string representation.
     * 
     * @api
     * @final
     * @override
     * @since 1.0.0
     * @version 1.0.0
     * 
     * @param string $value
     * @return string
     */
    public final function encode(mixed $value): string {

        return bzcompress($value, $this->blockSize, $this->workFactor);
    }

    /**
     * Decodes a string representation back into its original value.
     * 
     * @api
     * @final
     * @override
     * @since 1.0.0
     * @version 1.0.0
     * 
     * @param string $code
     * @return string
     */
    public final function decode(string $code): mixed {

        return bzdecompress($code, $this->useLessMemory);
    }
}
