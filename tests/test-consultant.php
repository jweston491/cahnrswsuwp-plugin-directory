<?php

namespace CAHNRSWSUWP\Plugin\Directory;

/**
 * Class SampleTest
 *
 * @package Cahnrswsuwp_Plugin_Directory
 */

/**
 * Sample test case.
 */
class ConsultantTest extends \WP_UnitTestCase {

	/**
	 * A single example test.
	 */

    public function setUp()
    {

		$this->post = $this->factory->post->create_and_get( array( 
			'post_type'              => 'consultant',
		));

		wp_update_post( array(
			'ID' => $this->post->ID,
			'meta_input'=> array(
				'_cwms'                  => true,
				'_pesticide_applicators' => 'Yes'
			),
		));

        $this->class_instance = new Consultant( $this->post );


    }
	public function test_consultant_license() {
		$test_string = 'Test';
		update_post_meta( $this->post->ID, '_licences_certifications', $test_string );
		$this->assertEquals( get_post_meta( $this->post->ID, '_licences_certifications', true ), $test_string );
	}

	public function test_consultant_license_blank() {
		$expected_value = 'Licensed Pesticide Applicator, Certified Wildfire Mitigation Specialist (CWMS)';
		delete_post_meta( $this->post->ID, '_licences_certifications' );
		$class_instance = new Consultant( $this->post );
		$this->assertEquals( $class_instance->get_option( '_licences_certifications' ), $expected_value );
	}
}
