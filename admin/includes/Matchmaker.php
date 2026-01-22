<?php
/**
 * Matchmaker Logic Class
 * Handles the logic for linking Adoption Interests (Donors) to Requests for Help (Beneficiaries)
 */
class Matchmaker {
    
    /**
     * Finds potential matches for a given donor interest based on criteria.
     * 
     * @param array $donorInterest The data from the donor's adoption interest
     * @param array $requests Array of available help requests from beneficiaries
     * @return array Ranked list of potential matches with match scores
     */
    public function findMatchesForDonor($donorInterest, $requests) {
        $matches = [];
        
        foreach ($requests as $request) {
            $score = $this->calculateMatchScore($donorInterest, $request);
            if ($score > 0) {
                $request['match_score'] = $score;
                $request['match_reasons'] = $this->getMatchReasons($donorInterest, $request);
                $matches[] = $request;
            }
        }
        
        // Sort by score descending
        usort($matches, function($a, $b) {
            return $b['match_score'] <=> $a['match_score'];
        });
        
        return $matches;
    }

    /**
     * Calculates a numerical score (0-100) for how well a request matches a donor's interest.
     */
    private function calculateMatchScore($donor, $request) {
        $score = 0;
        
        // Match by Type (Individual vs SME/Corporate)
        if (isset($donor['preferred_type']) && isset($request['type'])) {
            if ($donor['preferred_type'] === $request['type']) {
                $score += 40;
            }
        }
        
        // Match by Industry/Category
        if (isset($donor['preferred_category']) && isset($request['category'])) {
            if ($donor['preferred_category'] === $request['category']) {
                $score += 30;
            }
        }
        
        // Match by Location (State/Region)
        if (isset($donor['preferred_location']) && isset($request['location'])) {
            if ($donor['preferred_location'] === $request['location']) {
                $score += 20;
            }
        }
        
        // Match by Urgency
        if (isset($request['priority']) && $request['priority'] === 'high') {
            $score += 10;
        }
        
        return $score;
    }

    /**
     * Generates human-readable reasons for why a match was suggested.
     */
    private function getMatchReasons($donor, $request) {
        $reasons = [];
        
        if (isset($donor['preferred_type']) && $donor['preferred_type'] === $request['type']) {
            $reasons[] = "Matches preferred beneficiary type: " . ucfirst($request['type']);
        }
        
        if (isset($donor['preferred_category']) && $donor['preferred_category'] === $request['category']) {
            $reasons[] = "Matches preferred sector: " . $request['category'];
        }
        
        if (isset($donor['preferred_location']) && $donor['preferred_location'] === $request['location']) {
            $reasons[] = "Located in preferred state: " . $request['location'];
        }
        
        if (isset($request['priority']) && $request['priority'] === 'high') {
            $reasons[] = "High priority request needing immediate support";
        }
        
        return $reasons;
    }

    /**
     * Manually links a donor to a beneficiary request.
     * This logic validates if the link is permissible (e.g., both are active).
     */
    public function proposeLink($donorId, $requestId) {
        // In a real scenario, we would check database statuses here.
        // For now, we return a structured proposal.
        return [
            'donor_id' => $donorId,
            'request_id' => $requestId,
            'status' => 'pending_confirmation',
            'created_at' => date('Y-m-d H:i:s'),
            'message' => "Match proposal generated for manual review."
        ];
    }
}
