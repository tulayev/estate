<x-layout.app>

    <x-pages.insight.index.main
        :topicCategories="$topicCategories"
    />

    <x-pages.insight.index.list
        :topics="$topics"
    />

    <x-layout.newsletter />

</x-layout.app>
