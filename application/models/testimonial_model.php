<?php
/**
 * Copyright (c) 2015 Intelliant
 *
 * Product fuzzy search module
 * 
 * The MIT License (MIT)
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 *  @author Intelliant (open.ant@intelliant.net)
 */

class Testimonial_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * @param string $sort_by
     * @param string $sort_order
     * @param int $limit
     * @param int $offset
     * @return mixed
     */
    function get_all_testimonial($sort_by = '', $sort_order = 'DESC', $limit = 0, $offset = 0)
    {
        $this->db->select('testimonial.*, person.firstname, person.lastname , person.city');
        $this->db->from('testimonial');
        $this->db->join('person', 'person.id = testimonial.person_id', 'left');
        $this->db->where(array(
            'testimonial.expiry_timestamp' => '0000-00-00 00:00:00'
        ));
        if ($limit > 0) {
            $this->db->limit($limit, $offset);
        }
        if (!empty ($sort_by)) {

            $this->db->order_by($sort_by, $sort_order);
        }
        /* ------------for displaying recent orders first---------------- */
        if (empty ($sort_by)) {
            $this->db->order_by('testimonial.id', $sort_order);
        }

        return $this->db->get()->result_array();
    }
}